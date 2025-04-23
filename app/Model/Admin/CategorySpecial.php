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
use Illuminate\Support\Facades\Log;

class CategorySpecial extends BaseModel
{
    use Sluggable;
    use SluggableScopeHelpers;

    protected $table = 'category_special';

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    public function canEdit()
    {
        return Auth::user()->id = $this->create_by;
    }

    public function canDelete()
    {
        return true;
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }

    public function image()
    {
        return $this->morphOne(File::class, 'model')->where('custom_field', 'image');
    }

    public static function searchByFilter($request)
    {
        $result = self::with([
            'user',
        ]);

        if (!empty($request->name)) {
            $result = $result->where('name', 'like', '%' . $request->name . '%');
        }

        $result = $result->orderBy('created_at', 'desc')->get();
        return $result;
    }

    public static function getForSelectForProduct()
    {
        return self::query()
            ->leftJoin('categories', 'category_special.category_parent_id', '=', 'categories.id')
            ->select([
                'category_special.id',
                DB::raw("CONCAT(category_special.name, ' – ', categories.name) as name")
            ])
            ->orderBy('category_special.name', 'ASC')
            ->get();
    }

    public static function getForSelectForPost()
    {
        return self::select(['id', 'name', 'code', 'slug'])
            ->where(['type' => 20, 'show_home_page' => 1])
            ->orderBy('name', 'ASC')
            ->get();
    }

    public static function getDataForEdit($id)
    {
        return self::with(['posts', 'products', 'image'])->where('id', $id)
            ->firstOrFail();
    }

    public static function getDataForShow($id)
    {
        return self::where('id', $id)
            ->firstOrFail();
    }

    public function posts()
    {
        return $this->belongsToMany(Post::class, 'post_category_special', 'category_special_id', 'post_id');
    }

    public function products()
    {
        return $this->belongsToMany(Product::class, 'product_category_special', 'category_special_id', 'product_id');
    }

    public function category() {
        return $this->belongsTo(Category::class,'category_parent_id');
    }
}
