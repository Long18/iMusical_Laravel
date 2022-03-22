<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserRole extends Model
{
    use HasFactory;

    use HasFactory;
    protected $table = 'roles';
    public $timestamps = true;

    public function getRole(){
        return Role::where('status',1)
        ->where('role_id',$this->role_id)
        ->first();
    }
}
