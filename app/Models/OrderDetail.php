<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;

    use HasFactory;
    protected $table = 'order_details';
    public $timestamps = true;

    public function getProduct(){
        return Product::where('status',1)
        ->where('product_id', $this->product_id)
        ->first();
    }
}
