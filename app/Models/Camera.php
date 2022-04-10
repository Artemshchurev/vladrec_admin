<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Camera extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'name',
        'link',
        'house_id',
    ];

    public function house(): BelongsTo
    {
        return $this->belongsTo(House::class);
    }
}
