<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    public function orders(): HasMany
    {
        return $this->hasMany(Order::class);
    }
}
