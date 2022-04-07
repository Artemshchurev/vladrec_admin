<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Barrier extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'link',
        'camera_link',
        'user_id',
    ];
}
