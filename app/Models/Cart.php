<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    protected $table = 'cart';
    public $timestamps = false;

    public function getProduct(){
        return Product::where('status',1)
        ->where('product_id', $this->product_id)
        ->first();
    }
}
