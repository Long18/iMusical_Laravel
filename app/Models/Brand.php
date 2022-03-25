<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model{
    //
    use HasFactory;
    protected $table = 'brands';
    public $timestamps = false;
    protected $primaryKey = 'brand_id';

    public function getImages(){
        return BrandImage::where('brand_id',$this->brand_id)
        ->where('status',1)
        ->get();
    }
}