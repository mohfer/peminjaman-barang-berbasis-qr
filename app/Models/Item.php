<?php

namespace App\Models;

use App\Models\History;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Item extends Model
{
    use HasFactory;

    protected $guarded = [
        'id'
    ];

    public $timestamps = false;

    public function borrows(): HasMany
    {
        return $this->hasMany(Borrow::class);
    }

    public function histories(): HasMany
    {
        return $this->hasMany(History::class);
    }
}
