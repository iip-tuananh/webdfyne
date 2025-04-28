<?php

namespace App\Http\Controllers\Admin;

use App\Http\Traits\ResponseTrait;
use App\Model\Admin\Category;
use App\Model\Admin\Review;
use Illuminate\Http\Request;
use App\Model\Admin\Review as ThisModel;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Str;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Validator;
use \stdClass;

use Rap2hpoutre\FastExcel\FastExcel;
use PDF;
use App\Http\Controllers\Controller;
use \Carbon\Carbon;
use Illuminate\Validation\Rule;
use App\Helpers\FileHelper;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Model\Common\Customer;

class ReviewController extends Controller
{
    use ResponseTrait;
    protected $view = 'admin.reviews';
    protected $route = 'reviews';

    public function index()
    {
        return view($this->view . '.index');
    }

    // Hàm lấy data cho bảng list
    public function searchData(Request $request)
    {
        $objects = ThisModel::searchByFilter($request);

        return Datatables::of($objects)
            ->editColumn('product_id', function ($object) {
                return $object->product->name ?? '';
            })
            ->editColumn('created_at', function ($object) {
                return $object->created_at->format('d/m/y H:i');
            })
            ->editColumn('user_name', function ($object) {
                return $object->user_name. '<br>' . $object->user_email;
            })
            ->editColumn('approve_date', function ($object) {
                return $object->approve_date ? formatDate($object->approve_date) : '' ;
            })
            ->editColumn('approve_id', function ($object) {
                return $object->approve_id ? $object->approved->name : '';
            })
            ->editColumn('content', function ($object) {
                return Str::limit($object->content, 100);
            })
            ->editColumn('rating', function ($object) {
                $fullStar  = '<i class="fas fa-star text-warning"></i>';
                $emptyStar = '<i class="far fa-star text-muted"></i>';

                return str_repeat($fullStar, $object->rating)
                    . str_repeat($emptyStar, 5 - $object->rating);
            })
            ->addColumn('action', function ($object) {
                $result = '';
                $result .= '<a href="javascript:void(0)" title="Chi tiết" class="btn btn-sm btn-primary edit"><i class="fas fa-eye"></i></a>';
                $result .= '&nbsp;<a href="'.route('reviews.delete', $object->id).'" title="Xóa" class="btn btn-sm btn-danger confirm"><i class="fas fa-times"></i></a>';
                return $result;
            })
            ->addIndexColumn()
            ->rawColumns(['user_name', 'action', 'rating'])
            ->make(true);
    }

    public function create()
    {
        return view($this->view . '.create');
    }

    public function getReview(Request $request, $id) {
        $review = Review::query()->find($id);

        if($review) {
            $review->created_at = \Illuminate\Support\Carbon::parse($review->created_at)->format('d/m/Y H:i');
            $review->approve_date = \Illuminate\Support\Carbon::parse($review->approve_date)->format('d/m/Y H:i');
            return $this->responseSuccess("", $review);
        } else {
            return $this->responseErrors();
        }
    }

    public function getDataForEdit($id)
    {
        $json = new stdclass();
        $json->success = true;
        $json->data = ThisModel::getDataForEdit($id);
        return Response::json($json);
    }

    public function delete($id)
    {
        $object = ThisModel::findOrFail($id);

        $object->delete();

        $message = array(
            "message" => "Thao tác thành công!",
            "alert-type" => "success"
        );

        return redirect()->route($this->route . '.index')->with($message);
    }

    public function update($id, Request $request)
    {
        $object = ThisModel::findOrFail($id);

        $object->status = $request->status;
        if($request->status == 2) {
            $object->approve_id = auth()->id();
            $object->approve_date = Carbon::now();
        }
        $object->save();

        $json = new stdclass();
        $json->success = true;
        $json->message = 'Thao tác thành công';

        return Response::json($json);
    }

}
