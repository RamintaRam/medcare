<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class MARoles extends Model
{
    use SoftDeletes;
    use Notifiable;
    public $incrementing = false;

    protected $table = 'ma_roles';
    protected $fillable = ['id', 'name'];
}
