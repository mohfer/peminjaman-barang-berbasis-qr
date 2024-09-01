<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Borrow extends Model
{
    use HasFactory;

    protected $table = 'borrows';

    protected $guarded = [
        'id'
    ];

    public function item(): BelongsTo
    {
        return $this->belongsTo(Item::class, 'id_barang');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function return(): HasOne
    {
        return $this->hasOne(Returns::class);
    }
}
