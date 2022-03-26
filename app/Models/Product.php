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

    public function getBrand(){
        return Brand::where('brand_id',$this->brand_id)->first();
    }

    public function getCategory(){
        return Type::where('type_id',$this->category_id)->first();
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
            if($product->product_price_sale){
                $salePercent = floor(((float)$product->product_price_sale/(float)$product->product_price - 1)*100);

                $priceNPriceSale->priceSale = "<del>". number_format($product->product_price, 0, '', ',') . "</del> " . "  <b style='color: red;'> ".$salePercent. "% </b>";
                $priceNPriceSale->price = (number_format($product->product_price_sale, 0, '', ',') . " VND");

            }else{
                $priceNPriceSale->price = (number_format($product->product_price, 0, '', ',') . " VND");
            }
        }
        return $priceNPriceSale;
    }
}