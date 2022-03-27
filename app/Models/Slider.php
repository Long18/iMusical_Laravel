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

    public function getCreator(){
        return User::where('user_id',$this->created_by)
        ->first();
    }
}