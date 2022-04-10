<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class House extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'address',
    ];

    public function barriers(): HasMany
    {
        return $this->hasMany(Barrier::class);
    }
}