<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'phone',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function isGod(): bool {
        return $this->role === 'god';
    }

    public function isHouseAdmin(): bool {
        return $this->role === 'house-admin';
    }

    public function isSpecialService(): bool {
        return $this->role === 'special-service';
    }

    public function houses(): BelongsToMany
    {
        return $this->belongsToMany(House::class, 'house_user');
    }

    public function adminHouse(): BelongsTo
    {
        return $this->belongsTo(House::class, 'id');
    }

    public function statistics(): HasMany
    {
        return $this->hasMany(Statistic::class);
    }
}
