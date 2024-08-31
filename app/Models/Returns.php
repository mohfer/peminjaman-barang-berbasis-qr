<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Returns extends Model
{
    use HasFactory;

    protected $guarded = [
        'id'
    ];

    public function borrowing(): HasOne
    {
        return $this->hasOne(Borrowing::class);
    }
}
