<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Type extends Model{
    //
    use HasFactory;
    protected $table = 'types';
    public $timestamps = false;

    protected $primaryKey = 'type_id';

    public function getParent(){
        return Type::where('status',1)
        ->where('type_id',$this->parent_id)
        ->first();
    }

    public function getAllChilds(){
        return Type::where('status',1)
        ->where('parent_id',$this->type_id)
        ->get();
    }

    public function getTypeDetails(){
        return TypeDetail::where('type_id',$this->type_id)
        ->get();
    }

    public function getCreator(){
        return User::where('user_id',$this->create_by)
        ->first();
    }
}