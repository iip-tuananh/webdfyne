<?php

namespace App\Model\Admin;
use App\Model\BaseModel;
use App\Model\Common\File;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use DB;

class About extends BaseModel
{
    protected $table = 'abouts';

    public function image()
    {
        return $this->morphOne(File::class, 'model');
    }
}
