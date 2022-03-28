<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model{
    //
    use HasFactory;
    protected $table = 'orders';
    public $timestamps = false;

    protected $primaryKey = 'order_id';

    public function getOrderDetails(){
        return OrderDetail::where('order_id',$this->order_id)
        ->get();
    }

    public function getCreator(){
        return User::where('user_id',$this->created_by)
        ->first();
    }

    public function getUser(){
        return User::where('user_id',$this->user_id)
        ->first();
    }
}