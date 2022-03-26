<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BrandImage extends Model
{
    use HasFactory;

    use HasFactory;
    protected $table = 'brand_images';
    protected $primaryKey = 'brand_image_id';
    public $timestamps = false;
    
}
