<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pendataan extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'kategori_id', 'status', 'qty'];

    public function user(): BelongsTo
    {
        return $this->BelongsTo(User::class);
    }

    public function kategori(): BelongsTo
    {
        return $this->BelongsTo(Kategori::class);
    }
}