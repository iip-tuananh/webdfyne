<?php

namespace App\Model\Admin;
use App\Model\BaseModel;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    public const SUPPORT = 1;
    public const CONTACT = 2;

    protected $table = 'contacts';

    public static function searchByFilter($request) {
        $result = self::query();

        if (!empty($request->user_name)) {
            $result = $result->where('user_name', 'like', '%'.$request->user_name.'%');
        }

        $result = $result->orderBy('created_at','desc')->get();
        return $result;
    }
}
