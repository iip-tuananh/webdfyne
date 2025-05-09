<?php

namespace App\Model\Admin;

use App\Model\BaseModel;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';
    protected $fillable = ['id', 'customer_name', 'customer_address', 'status', 'capture_id', 'tracking_sent_at', 'carrier', 'tracking_number', 'country_code', 'postal_code',
        'customer_email', 'customer_phone', 'customer_required', 'payment_method', 'created_at', 'updated_at', 'code', 'discount_code', 'discount_value', 'total_before_discount', 'total_after_discount'];

    protected $appends = ['total_price'];

    public const MOI = 10;
    public const DA_THANH_TOAN = 20;
    public const DANG_VAN_CHUYEN = 30;
    public const DA_GIAO_HANG = 40;
    public const HUY = 50;

    public const STATUS = [
        self::MOI             => 'Mới',
        self::DA_THANH_TOAN   => 'Đã thanh toán',
        self::DANG_VAN_CHUYEN => 'Đang vận chuyển',
        self::DA_GIAO_HANG    => 'Đã giao hàng',
        self::HUY             => 'Hủy',
    ];

    public const PAYMENT_METHODS = [1=> 'Thanh toán khi nhận hàng - COD', 0 => 'Chuyển khoản ngân hàng'];

    public const STATUSES = [
        [
            'id' => self::MOI,
            'name' => 'Mới',
            'type' => 'secondary'
        ],
        [
            'id' => self::DA_THANH_TOAN,
            'name' => 'Đã thanh toán',
            'type' => 'info'
        ],
        [
            'id' => self::DANG_VAN_CHUYEN,
            'name' => 'Đang vận chuyển',
            'type' => 'warning'
        ],
         [
            'id' => self::DA_GIAO_HANG,
            'name' => 'Đã giao hàng',
            'type' => 'success'
        ],
         [
            'id' => self::HUY,
            'name' => 'Hủy',
            'type' => 'danger'
        ],
    ];

    public function details()
    {
        return $this->hasMany(OrderDetail::class, 'order_id');
    }

    public function getTotalPriceAttribute()
    {
        if ($this->total_after_discount > 0) {
            return $this->total_after_discount;
        }

        return $this->details->sum(function ($detail) {
            return $detail->price * $detail->qty;
        }) - $this->discount_value;
    }

    public static function searchByFilter($request)
    {
        $result = self::query();

        if (!empty($request->code)) {
            $result = $result->where('code', 'like', '%' . $request->code . '%');
        }

        if (!empty($request->status)) {
            $result = $result->where('status', $request->status);
        }

        if ($request->filled('startDate') && $request->filled('endDate')) {
            $start = Carbon::parse($request->startDate)->startOfDay();
            $end   = Carbon::parse($request->endDate)  ->endOfDay();

            $result->whereBetween('created_at', [$start, $end]);


        } elseif ($request->filled('startDate')) {
            $start = Carbon::parse($request->startDate)->startOfDay();
            $result->where('created_at', '>=', $start);


        } elseif ($request->filled('endDate')) {
            $end = Carbon::parse($request->endDate)->endOfDay();
            $result->where('created_at', '<=', $end);
        }

        $result = $result->orderBy('created_at', 'desc')->get();
        return $result;
    }
}
