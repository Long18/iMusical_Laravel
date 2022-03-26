<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeDetail extends Model{
    //
    use HasFactory;
    protected $table = 'types_detail';
    public $timestamps = false;

    protected $primaryKey = 'types_detail_id';

    public function getProduct(){
        return Product::where('status',1)
        ->where('product_id',$this->product_id)
        ->first();
    }
}
