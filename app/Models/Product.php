<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model{
    //
    use HasFactory;
    protected $table = 'products';
    public $timestamps = true;

    public function getBrand(){
        return Brand::where('brand_id',$this->brand_id)->first();
    }

    public function getCategory(){
        return Type::where('type_id',$this->category_id)->first();
    }

    public static function formatPriceToVND($price){
        if(empty($price)){
            return "<a href='' style='color: LightCoral;'>Please Contact</a>";
        }else{
            return number_format($price, 0, '', ','). " VND";
        }
    }
}