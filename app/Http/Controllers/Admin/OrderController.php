<?php

namespace App\Http\Controllers\Admin;

use App\Model\Admin\Order;
use Illuminate\Http\Request;
use App\Model\Admin\Order as ThisModel;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Response;
use League\Flysystem\Exception;
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
use App\Services\PayPalOrderService;

class OrderController extends Controller
{
    protected $paypal;
    protected $view = 'admin.orders';
    protected $route = 'orders';

    public function __construct(PayPalOrderService $paypal)
    {
        $this->paypal = $paypal;
    }


    public function index()
    {
        return view($this->view . '.index');
    }

    // Hàm lấy data cho bảng list
    public function searchData(Request $request)
    {
        $objects = ThisModel::searchByFilter($request);
        return Datatables::of($objects)
            ->addColumn('total_price', function ($object) {
                return number_format($object->total_price);
            })
            ->editColumn('code', function ($object) {
                return '<a href = "'.route('orders.show', $object->id).'" title = "Xem chi tiết">' . $object->code . '</a>';
            })
            ->editColumn('created_at', function ($object) {
                return Carbon::parse($object->created_at)->format('d/m/Y H:i');
            })
            ->editColumn('updated_at', function ($object) {
                return Carbon::parse($object->updated_at)->format('d/m/Y H:i');
            })
            ->addColumn('action', function ($object) {
                $result = '<div class="btn-group btn-action">
                <button class="btn btn-info btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class = "fa fa-cog"></i>
                </button>
                <div class="dropdown-menu">';
                $result = $result . ' <a href="" title="đổi trạng thái" class="dropdown-item update-status"><i class="fa fa-angle-right"></i>Đổi trạng thái</a>';
                $result = $result . ' <a href="'.route('orders.track.form', $object->id).'" title="Thêm tracking" class="dropdown-item"><i class="fa fa-angle-right"></i>Thêm tracking</a>';
                $result = $result . ' <a href="'.route('orders.show', $object->id).'" title="đổi trạng thái" class="dropdown-item"><i class="fa fa-angle-right"></i>Xem chi tiết</a>';
                $result = $result . '</div></div>';
                return $result;
            })
            ->addIndexColumn()
            ->rawColumns(['code', 'action'])
            ->make(true);
    }

    public function show(Request $request, $id) {
        $order = Order::query()->with(['details.product'])->find($id);
//        $order->payment_method_name = Order::PAYMENT_METHODS[$order->payment_method];

        return view($this->view . '.show', compact('order'));
    }

    public function updateStatus(Request $request)
    {
        $order = Order::query()->find($request->order_id);

        $order->status = $request->status;
        $order->save();

        return Response::json(['success' => true, 'message' => 'cập nhật trạng thái đơn hàng thành công']);
    }

    /** Hiển thị form Add Tracking */
    public function showTrackForm(Order $order)
    {
        return view('admin.orders.track', compact('order'));
    }


    /** Xử lý submit Add Tracking */
    public function track(Request $req, Order $order)
    {
        DB::beginTransaction();
        try{
            $validate = Validator::make(
                $req->all(),
                [
                    'capture_id'      => 'required|string',
                    'carrier'         => 'required|string',
                    'code' => 'required|string',
                    'notify_payer'    => 'sometimes|boolean',
                ]
            );
            $json = new stdclass();

            if ($validate->fails()) {
                $json->success = false;
                $json->errors = $validate->errors();
                $json->message = "Thao tác thất bại!";
                return Response::json($json);
            }
            $data = $req->all();

            // Gọi PayPal Tracking API
            $result = $this->paypal->trackOrder($order->code,[
                'capture_id'      => $data['capture_id'],
                'tracking_number' => $data['code'],
                'carrier'            => 'OTHER',
                'carrier_name_other' => $data['carrier'],
                'notify_payer'    => $data['notify_payer'] ?? false,
            ]);

            // Lưu lại để ghi nhận đã gửi
            $order->update([
                'carrier'         => $data['carrier'],
                'tracking_number'         => $data['code'],
                'tracking_sent_at'=> now(),
                'status'=> Order::DANG_VAN_CHUYEN,
            ]);

            DB::commit();

            $json->success = true;
            $json->result = $result;
            return Response::json($json);

        }catch (Exception $exception) {
            DB::rollBack();
            Log::error($exception);
        }

    }



}
