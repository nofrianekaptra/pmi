<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Kategori extends Model
{
    use HasFactory;
    protected $fillable = ['jenis_d', 'keterangan', 'stock_darah'];

    public function pendataans(): HasMany
    {
        return $this->HasMany(Pendataan::class);
    }

    public function penerimas(): HasMany
    {
        return $this->HasMany(Penerima::class);
    }
}