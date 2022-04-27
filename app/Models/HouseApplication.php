<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class HouseApplication extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'house_id',
        'is_approved',
    ];

    public function user(): BelongsTo {
        return $this->belongsTo(User::class);
    }

    public function house(): BelongsTo {
        return $this->belongsTo(House::class);
    }
}
