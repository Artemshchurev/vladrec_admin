<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
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

    public function cameras(): HasMany
    {
        return $this->hasMany(Camera::class);
    }

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'house_user');
    }
}
