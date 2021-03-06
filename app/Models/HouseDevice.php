<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;


class HouseDevice extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'name',
        'link',
        'camera_link',
        'house_id',
    ];

    public function house(): BelongsTo
    {
        return $this->belongsTo(House::class);
    }

    public function statistics(): HasMany
    {
        return $this->hasMany(Statistic::class);
    }
}
