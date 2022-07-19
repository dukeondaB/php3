<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Position_User extends Model
{
    use HasFactory;
    protected $table = 'position_user';
    protected $fillable = [
        'user_id',
        'position_id',
    ];
}
