<?php

namespace App\Model\Admin;

use App\Helpers\FileHelper;
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

class ProductVariant extends BaseModel
{

    protected $table = 'product_variants';


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

    public function baseProduct() {
        return $this->belongsTo(Product::class, 'product_id');
    }

    public function sizesStock() {
        return $this->hasMany(VariantSize::class, 'variant_id', 'id');
    }

    public function sizes()
    {
        return $this->belongsToMany(Size::class, 'variant_sizes', 'variant_id', 'size_id')->withPivot('stock');
    }

    public function color() {
        return $this->belongsTo(Color::class, 'color_id');
    }

    public function image()
    {
        return $this->morphOne(File::class, 'model')->where('custom_field', 'image');
    }

    public function galleries()
    {
        return $this->hasMany(ProductVariantGallery::class, 'variant_id', 'id');
    }

    public static function searchByFilter($request)
    {
        $result = self::with([
            'user',
            'color',
            'baseProduct',
            'sizes'

        ]);

        if($request->product_id) {
            $result = $result->where('product_id', $request->product_id);
        }

        if (!empty($request->name)) {
            $result = $result->where('name', 'like', '%' . $request->name . '%');
        }

        $result = $result->orderBy('created_at', 'desc')->get();
        return $result;
    }


    public static function getForSelect()
    {
        return self::select(['id', 'name'])
            ->orderBy('name', 'ASC')
            ->get();
    }

    public static function getDataForEdit($id)
    {
        $obj = self::with(['user', 'color', 'sizesStock',
            'galleries' => function ($q) {
                $q->select(['id', 'variant_id', 'sort'])
                    ->with(['image'])
                    ->orderBy('sort', 'ASC');
            },
            'image'])->where('id', $id)
            ->firstOrFail();

        $obj->selectedColor = ['id' => $obj->color->id, 'name' => $obj->color->name, 'hex_code' =>  $obj->color->hex_code];
        $sizeQuantities = [];

         foreach ($obj->sizesStock as $item) {
             $sizeQuantities[$item->size_id] = $item->stock;
         }
         $obj->sizeQuantities = $sizeQuantities;

         return $obj;
    }

    public static function getDataForShow($id)
    {
        return self::where('id', $id)
            ->firstOrFail();
    }

    public function syncGalleries($galleries)
    {
        if ($galleries) {
            $exist_ids = [];
            foreach ($galleries as $g) {
                if (isset($g['id'])) array_push($exist_ids, $g['id']);
            }
            $deleted = ProductVariantGallery::where('variant_id', $this->id)->whereNotIn('id', $exist_ids)->get();
            foreach ($deleted as $item) {
                if ($item->image) {
                    FileHelper::deleteFileFromCloudflare($item->image, $item->id, ProductVariantGallery::class);
                }
                $item->removeFromDB();
            }

            for ($i = 0; $i < count($galleries); $i++) {
                $g = $galleries[$i];

                if (isset($g['id'])) $gallery = ProductVariantGallery::find($g['id']);
                else $gallery = new ProductVariantGallery();

                $gallery->variant_id = $this->id;
                $gallery->sort = $i;
                $gallery->save();

                if (isset($g['image'])) {
                    if ($gallery->image) {
                        FileHelper::deleteFileFromCloudflare($gallery->image, $gallery->id, ProductVariantGallery::class);
                        $gallery->image->removeFromDB();
                    }
                    $file = $g['image'];
                    // FileHelper::uploadFile($file, 'product_gallery', $gallery->id, ProductGallery::class, null, 99);
                    FileHelper::uploadFileToCloudflare($file, $gallery->id, ProductVariantGallery::class, null);
                }
            }
        }
    }

}
