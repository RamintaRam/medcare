<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class MAUsers extends Authenticatable
{

    use SoftDeletes;
    use Notifiable;
    public $incrementing = false;

    protected $table = 'ma_users';
    protected $fillable = ['id', 'role_id', 'avatar_id', 'first_name', 'last_name', 'position', 'email', 'password', 'show_in_front'];


    protected $hidden = [
        'password', 'remember_token',
    ];


    public function roles() {
        return $this->belongsToMany(MARoles::class, 'ma_users_roles_connections', 'user_id', 'role_id');
    }


    public function role(){
        return $this->hasOne(MAUsersRolesConnections::class, 'user_id', 'id');
    }




}
