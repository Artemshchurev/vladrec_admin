<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DemoBarrier extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'link',
        'camera_link',
    ];
}
