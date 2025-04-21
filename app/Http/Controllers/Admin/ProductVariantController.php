<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Products\ProductStoreRequest;
use App\Http\Requests\Products\ProductUpdateRequest;
use App\Http\Requests\ProductVariant\ProductVariantStoreRequest;
use App\Http\Requests\ProductVariant\ProductVariantUpdateRequest;
use App\Model\Admin\AttributeValue;
use App\Model\Admin\Manufacturer;
use App\Model\Admin\Post;
use App\Model\Admin\Product;
use App\Model\Admin\ProductCategorySpecial;
use App\Model\Admin\ProductVariant;
use App\Model\Admin\ProductVideo;
use App\Model\Admin\Tag;
use App\Model\Admin\VariantSize;
use Cassandra\Exception\ProtocolException;
use Illuminate\Http\Request;
use App\Model\Admin\ProductVariant as ThisModel;
use App\Model\Common\Unit;
use Yajra\DataTables\DataTables;
use Validator;
use \stdClass;
use Response;
use Rap2hpoutre\FastExcel\FastExcel;
use PDF;
use App\Http\Controllers\Controller;
use \Carbon\Carbon;
use DB;
use App\Helpers\FileHelper;
use App\Model\Common\User;
use App\Model\Common\ActivityLog;
use Auth;

class ProductVariantController extends Controller
{
    protected $view = 'admin.product_variants';
    protected $route = 'product_variants';

    public function index()
    {
        return view($this->view.'.index');
    }

    // Hàm lấy data cho bảng list
    public function searchData(Request $request)
    {
        $objects = ThisModel::searchByFilter($request);
        return Datatables::of($objects)
            ->addColumn('name', function ($object) {
                return $object->baseProduct->name;
            })
            ->editColumn('price', function ($object) {
                return formatCurrent($object->baseProduct->price);
            })
            ->addColumn('color', function ($object) {
                return $object->color->hex_code;
            })
            ->editColumn('created_at', function ($object) {
                return Carbon::parse($object->created_at)->format("d/m/Y");
            })
            ->editColumn('created_by', function ($object) {
                return $object->user_create->name ? $object->user_create->name : '';
            })
            ->editColumn('updated_by', function ($object) {
                return $object->user_update->name ? $object->user_update->name : '';
            })
            ->editColumn('cate_id', function ($object) {
                return $object->baseProduct->category ? $object->baseProduct->category->name : '';
            })
            ->editColumn('type', function ($object) {
                return $object->category ? $object->category->name : '';
            })
            ->addColumn('action', function ($object) {
                $result = '<div class="btn-group btn-action">
                <button class="btn btn-info btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class = "fa fa-cog"></i>
                </button>
                <div class="dropdown-menu">';

                if($object->canEdit()) {
                    $result = $result . ' <a href="'. route($this->route.'.edit', $object->id) .'" title="sửa" class="dropdown-item"><i class="fa fa-angle-right"></i>Sửa</a>';
                }
                if ($object->canDelete()) {
                    $result = $result . ' <a href="' . route($this->route.'.delete', $object->id) . '" title="xóa" class="dropdown-item confirm"><i class="fa fa-angle-right"></i>Xóa</a>';

                }

                $result = $result . '</div></div>';
                return $result;
            })
            ->addIndexColumn()
            ->rawColumns(['action'])
            ->make(true);
    }

    public function create()
    {
        return view($this->view.'.create');
    }

    public function store(ProductVariantStoreRequest $request)
    {
        $json = new stdClass();
        DB::beginTransaction();
        try {
            $object = new ThisModel();
            $object->product_id = $request->product_id;
            $object->color_id = $request->selectedColor['id'];
            $object->is_default = $request->is_default;
            $object->slug = uniqid();

            $object->save();

            $productBase = Product::query()->find($request->product_id);
            $slug = $productBase->slug . '-' . $object->color_id .'-' . $object->id;
            $object->slug = $slug;
            $object->save();

            foreach ($request->sizeQuantities as $key => $sizeQuantity) {
                $obj = new VariantSize();
                $obj->variant_id = $object->id;
                $obj->size_id = $key;
                $obj->stock = $sizeQuantity;
                $obj->save();
            }

            FileHelper::uploadFileToCloudflare($request->image, $object->id, ThisModel::class, 'image');
            $object->syncGalleries($request->galleries);

            if($object->is_default) {
                if($productBase->variants()->count()) {
                    $productBase->variants()->whereNotIn('id', [$object->id])->update(['is_default' => 0]);
                }
            }

            DB::commit();
            $json->success = true;
            $json->message = "Thao tác thành công!";
            return Response::json($json);
        } catch (Exception $e) {
            DB::rollBack();
            throw new Exception($e->getMessage());
        }
    }

    public function edit($id)
    {
        $object = ThisModel::getDataForEdit($id);

        return view($this->view.'.edit', compact('object'));
    }

    public function update(ProductVariantUpdateRequest $request, $id)
    {
        $json = new stdClass();

        DB::beginTransaction();
        try {
            $object = ThisModel::findOrFail($id);

            if (!$object->canEdit()) {
                $json->success = false;
                $json->message = "Bạn không có quyền sửa sản phẩm này";
                return Response::json($json);
            }

            $object->product_id = $request->product_id;
            $object->color_id = $request->selectedColor['id'];
            $object->is_default = $request->is_default;

            $object->save();

            $productBase = Product::query()->find($request->product_id);
            $slug = $productBase->slug . '-' . $object->color_id .'-' . $object->id;
            $object->slug = $slug;
            $object->save();

            VariantSize::query()->where('variant_id', $object->id)->delete();

            foreach ($request->sizeQuantities as $key => $sizeQuantity) {
                $obj = new VariantSize();
                $obj->variant_id = $object->id;
                $obj->size_id = $key;
                $obj->stock = $sizeQuantity;
                $obj->save();
            }

            if($request->image) {
                if($object->image) {
                    FileHelper::deleteFileFromCloudflare($object->image, $object->id, ThisModel::class, 'image');
                }
                FileHelper::uploadFileToCloudflare($request->image, $object->id, ThisModel::class, 'image');
            }


            $object->syncGalleries($request->galleries);

            if($object->is_default) {
                if($productBase->variants()->count()) {
                    $productBase->variants()->whereNotIn('id', [$object->id])->update(['is_default' => 0]);
                }
            }

            DB::commit();
            ActivityLog::createRecord("Cập nhật sản phẩm thành công", route('Product.edit', $object->id, false));
            $json->success = true;
            $json->message = "Thao tác thành công!";
            return Response::json($json);
        } catch (Exception $e) {
            DB::rollBack();
            throw new Exception($e->getMessage());
        }
    }

    public function delete($id)
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');

        $object = ThisModel::findOrFail($id);
        if (!$object->canDelete()) {
            $message = array(
                "message" => "Không thể xóa!",
                "alert-type" => "warning"
            );
        } else {
            if($object->galleries->count() > 0) {
                foreach ($object->galleries as $gallery) {
                    if ($gallery->image) {
                        FileHelper::deleteFileFromCloudflare($gallery->image, $gallery->id, ProductVariant::class);
                    }
                    $gallery->removeFromDB();
                }
            }
            if($object->image) {
                FileHelper::deleteFileFromCloudflare($object->image, $object->id, ThisModel::class, 'image');
            }
            if($object->image_back) {
                FileHelper::deleteFileFromCloudflare($object->image_back, $object->id, ThisModel::class, 'image_back');
            }
            $object->delete();
            $message = array(
                "message" => "Thao tác thành công!",
                "alert-type" => "success"
            );
        }
        return redirect()->route($this->route.'.index')->with($message);
    }


    public function getData(Request $request, $id) {
        $json = new stdclass();
        $json->success = true;
        $json->data = ThisModel::getDataForEdit($id);
        return Response::json($json);
    }

    // Xuất Excel
    public function exportExcel(Request $request)
    {
        return (new FastExcel(ThisModel::searchByFilter($request)))->download('danh_sach_hang_hoa.xlsx', function ($object) {
            if(Auth::user()->type == User::G7 || Auth::user()->type == User::NHOM_G7) {
                return [
                    'ID' => $object->id,
                    'Mã' => $object->code,
                    'Tên' => $object->name,
                    'Loại' => $object->category->name,
                    'Giá đề xuất' => formatCurrency($object->price),
                    'Giá bán' => formatCurrency($object->g7_price->price),
                    'Điểm tích lũy' => $object->point,
                    'Trạng thái' => $object->status == 0 ? 'Khóa' : 'Hoạt động',
                ];
            } else {
                return [
                    'ID' => $object->id,
                    'Mã' => $object->code,
                    'Tên' => $object->name,
                    'Loại' => $object->category->name,
                    'Giá đề xuất' => formatCurrency($object->price),
                    'Điểm tích lũy' => $object->point,
                    'Trạng thái' => $object->status == 0 ? 'Khóa' : 'Hoạt động',
                ];
            }
        });
    }

    // Xuất PDF
    public function exportPDF(Request $request) {
        $data = ThisModel::searchByFilter($request);
        $pdf = PDF::loadView($this->view.'.pdf', compact('data'));
        return $pdf->download('danh_sach_hang_hoa.pdf');
    }

    public function addToCategorySpecial(Request $request) {
        $product = Product::query()->find($request->product_id);

        $product->category_specials()->sync($request->category_special_ids);

        return Response::json(['success' => true, 'message' => 'Thao tác thành công']);
    }

    // xóa nhiều sản phẩm
    public function actDelete(Request $request) {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        $product_ids = explode(',', $request->product_ids);
        foreach ($product_ids as $product_id) {
            $product = ThisModel::findOrFail($product_id);
            if($product->image) {
                FileHelper::deleteFileFromCloudflare($product->image, $product->id, ThisModel::class, 'image');
            }
        }

        Product::query()->whereIn('id', $product_ids)->delete();

        $message = array(
            "message" => "Thao tác thành công!",
            "alert-type" => "success"
        );

        return redirect()->route($this->route.'.index')->with($message);
    }

    public function deleteFile(Request $request, $id) {
        $json = new \stdClass();
        $req = Product::findOrFail($id);

        $attachments = explode(", ", $req->attachments);

        if (!$request->file || !in_array($request->file, $attachments)) {
            $json->success = false;
            $json->message = "Không có file";
            return \Response::json($json);
        }

        if (file_exists(public_path().$request->file)) unlink(public_path().$request->file);

        $attachments = array_diff($attachments, [$request->file]);
        $req->attachments = join(", ", $attachments);
        $req->save();
        $json->success = true;
        $json->message = "Xóa thành công";
        $json->data = $req;

        return \Response::json($json);
    }

}
