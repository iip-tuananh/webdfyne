<?php

namespace App\Model\Admin;
use Auth;
use App\Model\BaseModel;
use App\Model\Common\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use App\Model\Common\File;
use DB;
use App\Model\Common\Notification;

class Review extends Model
{
    const STATUS_PENDING = 1;
    const STATUS_APPROVED = 2;
    const STATUS_REJECTED = 3;

    public const STATUSES = [
        [
            'id' => self::STATUS_PENDING,
            'name' => 'Chờ duyệt',
            'type' => 'secondary'
        ],
        [
            'id' => self::STATUS_APPROVED,
            'name' => 'Đã duyệt',
            'type' => 'info'
        ],
        [
            'id' => self::STATUS_REJECTED,
            'name' => 'Không duyệt',
            'type' => 'danger'
        ],
    ];

    public function product() {
        return $this->belongsTo(Product::class, 'product_id');
    }

    public function approved() {
        return $this->belongsTo(User::class, 'approve_id');
    }

    public static function searchByFilter($request) {
        $result = self::with([
            'product',
            'approved',
        ]);

        if (!empty($request->product_id)) {
            $result = $result->where('product_id', $request->product_id);
        }

        if (!empty($request->user_name)) {
            $result = $result->where(function($q) use ($request) {
                $q->where('name', 'like', '%'.$request->user_name.'%')
                    ->orWhere('email', 'like', '%'.$request->user_name.'%');
            });
        }

        if (!empty($request->status)) {
            $result = $result->where('status', $request->status);
        }

        $result = $result->orderBy('created_at','desc')->get();
        return $result;
    }

    public static function getForSelect() {
        return self::where('status', 1)
            ->select(['id', 'name'])
            ->orderBy('name', 'ASC')
            ->get();
    }

    public static function getDataForEdit($id) {
        $review =  self::query()->with(['approved'])->where('id', $id)->firstOrFail();
        $review->create_at = Carbon::parse($review->created_at)->format('d/m/Y H:i');
        $review->approve_date = $review->approve_date ? Carbon::parse($review->approve_date)->format('d/m/Y H:i') : '';

        return $review;
    }

    public static function getDataForShow($id) {
        return self::where('id', $id)

            ->firstOrFail();
    }

}
