<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wards extends Model
{
    use HasFactory;
    public $timeStamps = false;
    protected $fillable = ['ward_name','type','province_id'];

    protected $primaryKey = 'ward_id';
    protected $table = 'local_wards';
}
