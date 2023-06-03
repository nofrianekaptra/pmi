<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Penerima extends Model
{
    use HasFactory;
    protected $fillable = [
        'kategori_id',
        'nama_penerima',
        'nik',
        'nohp',
        'batas_tgl',
        'desk_kondisi',
        'qty'
    ];
    protected $casts = ['batas_tgl' => 'datetime'];

    public function kategori(): BelongsTo
    {
        return $this->BelongsTo(Kategori::class);
    }

    public function scopePending($query)
    {
        return $query->where('status', '=', 'Pending');
    }
}