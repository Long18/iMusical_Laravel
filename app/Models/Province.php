<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    use HasFactory;
    public $timeStamps = false;
    protected $fillable = ['province_name','type','city_id'];

    protected $primaryKey = 'province_id';
    protected $table = 'local_province';
}
