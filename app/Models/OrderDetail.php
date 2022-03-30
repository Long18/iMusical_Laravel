<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;

    use HasFactory;
    protected $table = 'order_details';
    public $timestamps = false;

    protected $primaryKey = 'orders_detail_id';
    protected $fillable = ['order_id','product_id','order_detail_price','order_detail_price_sale','order_detail_quantity','order_detail_total']; 

    public function getProduct(){
        return Product::where('status',1)
        ->where('product_id', $this->product_id)
        ->first();
    }

    public function getTotalSum(){
        if($this->order_detail_price_sale){
            $total =  $this->order_detail_price_sale * $this->order_detail_quantity;
        }else{
            $total = $this->order_detail_price * $this->order_detail_quantity;
        }
        return $total;
    }
}
