<?php

namespace App\Model\Admin;

use App\Model\BaseModel;
use \Illuminate\Database\Eloquent\Model;

class VariantSize extends Model
{
    protected $table = 'variant_sizes';

    public function size() {
        return $this->belongsTo(Size::class, 'size_id');
    }

    public function variant() {
        return $this->belongsTo(ProductVariant::class, 'variant_id');
    }

}
