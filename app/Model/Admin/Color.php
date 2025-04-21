<?php

namespace App\Model\Admin;

use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;
use Illuminate\Support\Facades\Auth;
use App\Model\BaseModel;
use App\Model\Common\User;
use Illuminate\Database\Eloquent\Model;
use App\Model\Common\File;
use DB;
use App\Model\Common\Notification;

class Color extends BaseModel
{

    protected $table = 'colors';


    public function canEdit()
    {
        return Auth::user()->id = $this->created_by;
    }

    public function canDelete()
    {
        return true;
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }

    public static function searchByFilter($request)
    {
        $result = self::with([
            'user',
        ]);

        if (!empty($request->name)) {
            $result = $result->where('name', 'like', '%' . $request->name . '%');
        }

        if (!empty($request->code)) {
            $result = $result->where('code', 'like', '%' . $request->code . '%');
        }


        $result = $result->orderBy('created_at', 'desc')->get();
        return $result;
    }


    public static function getForSelect()
    {
        return self::select(['id', 'name', 'hex_code'])
            ->orderBy('name', 'ASC')
            ->get();
    }

    public static function getDataForEdit($id)
    {
        return self::with(['user'])->where('id', $id)
            ->firstOrFail();
    }

    public static function getDataForShow($id)
    {
        return self::where('id', $id)
            ->firstOrFail();
    }
}
