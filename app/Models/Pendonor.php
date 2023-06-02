<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Pendonor extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'nik',
        'nohp',
    ];

    public function user(): BelongsTo
    {
        return $this->BelongsTo(User::class);
    }
}