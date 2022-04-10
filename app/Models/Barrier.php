<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;


class Barrier extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'name',
        'link',
        'camera_link',
        'house_id',
    ];

    public function house(): HasOne
    {
        return $this->hasOne(House::class);
    }
}
