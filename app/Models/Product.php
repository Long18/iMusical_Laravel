<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model{
    //
    use HasFactory;
    protected $table = 'products';
    public $timestamps = false;

    protected $primaryKey = 'product_id';

    public function getImg(){
        return ProductImages::where('product_id',$this->product_id)->first();
    }

    public function getBrand(){
        return Brand::where('brand_id',$this->brand_id)->first();
    }

    public function getImagesBrand(){
        return BrandImage::where('brand_id',$this->brand_id)
        ->where('status',1)
        ->get();
    }

    public function getNameProduct(){
        return Product::where('product_name',$this->product_name)->first();
    }

    public function getCategory(){
        return Type::where('type_id',$this->category_id)->first();
    }

    public function getCreator(){
        return User::where('user_id',$this->created_by)->first();
    }

    public function getUserImage(){
        return User::where('user_id',$this->created_by)->first();
    }

    public function getTypeDetails(){
        return TypeDetail::where('product_id',$this->product_id)->get();
    }

    public function getAllImg(){
        return ProductImages::where('product_id',$this->product_id)->get();
    }

    public static function formatPriceToVND($product){
        // have price and no price sale
        $priceNPriceSale =(object)array(
            'price'=> "",
            'priceSale'=> "Current Price"
        );

        if(empty($product->product_price)){
            // if product doesn't have price
            $priceNPriceSale->price = "<a href='' style='color: LightCoral;'>Please Contact</a>";
        }else{
            // if product has priceSale
            if($product->product_sale_price){
                $salePercent = floor(((float)$product->product_sale_price/(float)$product->product_price - 1)*100);

                $priceNPriceSale->priceSale = "<del>". number_format($product->product_price, 0, '', ',') . "</del> " . '  <b style="color: red"> '.$salePercent. "% </b>";
                $priceNPriceSale->price = (number_format($product->product_sale_price, 0, '', ',') . " VND");

            }else{
                $priceNPriceSale->price = (number_format($product->product_price, 0, '', ',') . " VND");
            }
        }
        return $priceNPriceSale;
    }

    public static function formatVND($price){
        $value = (int)$price;
        if($value != "" && $value != null){
            return number_format($value, 0, '', ',') + " VND";
        }
        return "0 VND";
    }
}
