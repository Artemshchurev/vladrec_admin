<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Statistic extends Model
{
    use HasFactory;

    protected $fillable = [
        'barrier_id',
        'user_id',
        'photo',
    ];

    public function barrier(): BelongsTo
    {
        return $this->belongsTo(Barrier::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}