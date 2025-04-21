<?php

namespace App\Model\Admin;

use App\Model\BaseModel;
use Illuminate\Database\Eloquent\Model;

class ProductCollection extends Model
{
    protected $table = 'product_collections';

    public function category() {
        return $this->belongsTo(Category::class, 'category');
    }
}
