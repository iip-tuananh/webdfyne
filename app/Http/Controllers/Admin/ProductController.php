<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Products\ProductStoreRequest;
use App\Http\Requests\Products\ProductUpdateRequest;
use App\Model\Admin\AttributeValue;
use App\Model\Admin\Manufacturer;
use App\Model\Admin\Post;
use App\Model\Admin\Product;
use App\Model\Admin\ProductCategorySpecial;
use App\Model\Admin\ProductCollection;
use App\Model\Admin\ProductSize;
use App\Model\Admin\ProductSuggest;
use App\Model\Admin\ProductVideo;
use App\Model\Admin\Tag;
use Cassandra\Exception\ProtocolException;
use Illuminate\Http\Request;
use App\Model\Admin\Product as ThisModel;
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

class ProductController extends Controller
{
	protected $view = 'admin.products';
	protected $route = 'Product';

	public function index()
	{
		return view($this->view.'.index');
	}

	// Hàm lấy data cho bảng list
    public function searchData(Request $request)
    {
		$objects = ThisModel::searchByFilter($request);
        $badgeClasses = [
            'badge-primary', 'badge-secondary', 'badge-success',
            'badge-danger', 'badge-warning', 'badge-info',
            'badge-light', 'badge-dark'
        ];

        return Datatables::of($objects)
			->addColumn('name', function ($object) {
				return $object->name;
			})
			->editColumn('price', function ($object) {
				return formatCurrent($object->price);
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
					return $object->category ? $object->category->name : '';
			})

            ->addColumn('count_variants', function ($object) {
                $count = $object->variants()->count();
                $url = route('product_variants.index').'?product-id='.$object->id;

                return '<a href="' . $url . '"'
                    .  ' class="badge badge-info square-badge"'
                    .  ' target="_blank"'
                    .  ' title="Xem ' . $count . ' biến thể">'
                    .  $count
                    .  '</a>';
            })
            ->addColumn('category_special', function ($object) use ($badgeClasses) {
                return $object->category_specials
                    ->map(function($special) use ($badgeClasses) {
                        $cls = $badgeClasses[array_rand($badgeClasses)];
                        return '<span class="badge '. $cls .' badge-pill px-3 py-2 mr-1" style="font-size: 0.7rem;">'
                            . e($special->name) .
                            '</span>';
                    })
                    ->implode('');
            })
            ->addColumn('category_collection', function ($object) use ($badgeClasses) {
                return $object->collections
                    ->map(function($col) use ($badgeClasses) {
                        $cls = $badgeClasses[array_rand($badgeClasses)];
                        return '<span class="badge '. $cls .' badge-pill px-3 py-2 mr-1" style="font-size: 0.7rem;">'
                            . e($col->name) .
                            '</span>';
                    })
                    ->implode('');
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

                $result = $result . ' <a href="' . route('product_variants.index').'?product-id='.$object->id . '" title="Quản lý biến thể" class="dropdown-item" target="_blank"><i class="fa fa-angle-right"></i>Quản lý biến thể</a>';
                $result = $result . ' <a href="' . route('reviews.index').'?product-id='.$object->id . '" title="Quản lý review" class="dropdown-item" target="_blank"><i class="fa fa-angle-right"></i>Quản lý review</a>';
                $result = $result . ' <a href="' . route('products-suggest.edit').'?product-id='.$object->id . '" title="Cấu hình gợi ý sản phẩm" class="dropdown-item" target="_blank"><i class="fa fa-angle-right"></i>Cấu hình gợi ý sản phẩm</a>';

                $result = $result . '</div></div>';
                return $result;
			})
			->addIndexColumn()
			->rawColumns(['action', 'category_collection', 'category_special', 'count_variants'])
			->make(true);
    }

	public function create()
	{
        return view($this->view.'.create');
	}

	public function store(ProductStoreRequest $request)
	{
		$json = new stdClass();
		DB::beginTransaction();
		try {
			$object = new ThisModel();
			$object->name = $request->name;
			$object->cate_id = $request->cate_id;
			$object->body = $request->body;
			$object->features = $request->features;
			$object->model_sizes = $request->model_sizes;
			$object->delivery_note = $request->delivery_note;
			$object->price = $request->price;
			$object->base_price = $request->base_price;

			$object->save();

            $object->sizes()->sync($request->size_ids);
            $object->collections()->sync($request->collections_ids);
            $object->category_specials()->sync($request->categories_special_ids);

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

	public function update(ProductUpdateRequest $request, $id)
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

            $object->name = $request->name;
            $object->cate_id = $request->cate_id;
            $object->body = $request->body;
            $object->features = $request->features;
            $object->model_sizes = $request->model_sizes;
            $object->delivery_note = $request->delivery_note;
            $object->price = $request->price;
            $object->base_price = $request->base_price;
            $object->save();


            $object->sizes()->sync($request->size_ids);

            foreach ($object->variants as $variant) {
                $existing = $variant->sizesStock()
                    ->pluck('stock', 'size_id')
                    ->toArray();

                $oldSizeIds = array_keys($existing);
                $newSizeIds = $request->size_ids ?? [];

                $toDetach = array_diff($oldSizeIds, $newSizeIds);
                $toAttach = array_diff($newSizeIds, $oldSizeIds);

                if (!empty($toDetach)) {
                    $variant->sizes()->detach($toDetach);
                }

                $attachData = [];
                foreach ($toAttach as $sizeId) {
                    $attachData[$sizeId] = ['stock' => 0];
                }
                if (!empty($attachData)) {
                    $variant->sizes()->attach($attachData);
                }
            }


            $object->collections()->sync($request->collections_ids);
            $object->category_specials()->sync($request->categories_special_ids);

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
            foreach ($object->variants as $variant) {
                $variant->sizesStock()->delete();
            }
            $object->variants()->delete();

            ProductSize::query()->where('product_id', $object->id)->delete();

            ProductCategorySpecial::query()->where('product_id', $object->id)->delete();
            ProductCollection::query()->where('product_id', $object->id)->delete();
            ProductSuggest::query()->where('product_id', $object->id)
                ->orWhere('suggested_product_id', $object->id)
                ->delete();

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

    public function productSuggest(Request $request) {
        $product = Product::query()->find($request->get('product-id'));

        if(! $product) return view('not_found');
        $suggestCompleteYourLookArr = $product
            ->completeYourLook()
            ->with('variantDefault.image')
            ->get()
            ->map(function ($item) {
                return [
                    'id'    => $item->id,
                    'name'  => $item->name,
                    'image' => optional($item->variantDefault->image)->path ?: '',
                ];
            })
            ->toArray();

        $suggestUpSellArr = $product
            ->upsells()
            ->with('variantDefault.image')
            ->get()
            ->map(function ($item) {
                return [
                    'id'    => $item->id,
                    'name'  => $item->name,
                    'image' => optional($item->variantDefault->image)->path ?: '',
                ];
            })
            ->toArray();

        $suggestCrossSellArr = $product
            ->crossSells()
            ->with('variantDefault.image')
            ->get()
            ->map(function ($item) {
                return [
                    'id'    => $item->id,
                    'name'  => $item->name,
                    'image' => optional($item->variantDefault->image)->path ?: '',
                ];
            })
            ->toArray();

        $suggestions = [
            'complete_your_look' => $suggestCompleteYourLookArr,
            'upsell' => $suggestUpSellArr,
            'cross_sell' => $suggestCrossSellArr,
        ];

        return view('admin.product_suggest.edit', compact('product', 'suggestions'));
    }
    public function submitProductSuggest(Request $request) {
        \Illuminate\Support\Facades\DB::beginTransaction();
        try {
            $data = $request->validate([
                'product_id'                     => 'required|exists:products,id',
                'suggestions'                    => 'nullable|array',
                'suggestions.complete_your_look' => 'array',
                'suggestions.upsell'             => 'array',
                'suggestions.cross_sell'         => 'array',
                'suggestions.*.*'                => 'integer|exists:products,id',
            ]);

            $product = Product::findOrFail($data['product_id']);

            $product->completeYourLook()->detach();
            foreach ($data['suggestions']['complete_your_look'] ?? [] as $id) {
                $product->completeYourLook()
                    ->attach($id, ['type' => 'complete_your_look']);
            }


            $product->upsells()->detach();
            foreach ($data['suggestions']['upsell'] ?? [] as $id) {
                $product->upsells()
                    ->attach($id, ['type' => 'upsell']);
            }


            $product->crossSells()->detach();
            foreach ($data['suggestions']['cross_sell'] ?? [] as $id) {
                $product->crossSells()
                    ->attach($id, ['type' => 'cross_sell']);
            }

            $json = new stdclass();
            $json->success = true;
            $json->message = 'Thao tác thành công';

            \Illuminate\Support\Facades\DB::commit();

            return Response::json($json);
        } catch (\Exception $exception) {
            \Illuminate\Support\Facades\DB::rollBack();
            \Illuminate\Support\Facades\Log::error($exception);
        }
    }

}
