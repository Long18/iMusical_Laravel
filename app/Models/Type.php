<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Type extends Model{
    //
    use HasFactory;
    protected $table = 'types';
    public $timestamps = true;

    public function getParent(){
        return Type::where('status',1)
        ->where('type_id',$this->parent_id)
        ->first();
    }

    public function getTypeDetails(){
        return TypeDetail::where('type_id',$this->type_id)
        ->get();
    }
}