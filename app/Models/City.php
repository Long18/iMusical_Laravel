<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;

    public $timeStamps = false;
    protected $fillable = ['city_name','type'];

    protected $primaryKey = 'city_id';
    protected $table = 'local_city';
}
