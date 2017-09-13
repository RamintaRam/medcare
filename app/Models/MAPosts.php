<?php

namespace App\Models;

use App\Models\CoreModel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class MAPosts extends CoreModel
{
    use SoftDeletes;
    use Notifiable;
    public $incrementing = false;

    protected $table = 'ma_posts';
    protected $fillable = ['id', 'user_id', 'title', 'text'];



}
