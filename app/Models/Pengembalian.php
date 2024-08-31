<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Pengembalian extends Model
{
    use HasFactory;

    protected $guarded = [
        'id'
    ];

    public function peminjaman(): HasOne
    {
        return $this->hasOne(Peminjaman::class);
    }
}
