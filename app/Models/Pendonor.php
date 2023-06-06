<?php

namespace App\Models;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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

    public function pendataans(): HasMany
    {
        return $this->HasMany(Pendataan::class);
    }

    public function scopeUserlog($query)
    {
        return $query->where('user_id', Auth::id());
    }
}