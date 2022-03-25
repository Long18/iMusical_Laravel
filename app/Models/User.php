<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasFactory;
    protected $table = 'users';
    public $timestamps = false;

    protected $primaryKey = 'user_id';

    public function getRoles(){
        return UserRole::where('status',1)
        ->where('user_id',$this->user_id)
        ->get();
    }
}
