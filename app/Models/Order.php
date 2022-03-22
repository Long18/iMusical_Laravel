<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model{
    //
    use HasFactory;
    protected $table = 'orders';
    public $timestamps = true;

    public function getOrderDetails(){
        return OrderDetail::where('order_id',$this->order_id)
        ->get();
    }
}