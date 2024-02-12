<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Sale extends Model
{
    use HasFactory;

    public function Items(): HasMany
    {
        return $this->hasMany(Item::class);
    }

    public function Customer(): HasOne
    {
        return $this->hasOne(Customer::class);
    }
}
