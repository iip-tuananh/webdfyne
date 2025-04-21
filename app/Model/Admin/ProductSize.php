<?php

namespace App\Model\Admin;

use App\Model\BaseModel;
use Illuminate\Database\Eloquent\Model;

class ProductSize extends Model
{
    protected $table = 'product_sizes';
    protected $fillable = ['product_id', 'size_id'];

    public function size() {
        return $this->belongsTo(Size::class, 'size_id');
    }
}
