<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model{
    //
    use HasFactory;
    protected $table = 'sliders';
    public $timestamps = false;

    protected $primaryKey = 'slider_id';

    public function getCreatePerson(){
        return User::where('user_id',$this->create_by)
        ->first();
    }
}