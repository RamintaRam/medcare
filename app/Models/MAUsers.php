<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class MAUsers extends CoreModel
{
    protected $table = 'ma_users';
    protected $fillable = ['id', 'role_id', 'avatar_id', 'first_name', 'last_name', 'position', 'email', 'password', 'remember_token', 'show_in_front'];


}
