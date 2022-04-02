<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductImages extends Model{
    //
    use HasFactory;
    protected $table = 'product_img';
    protected $primaryKey = 'product_img_id';
    public $timestamps = false;


}
