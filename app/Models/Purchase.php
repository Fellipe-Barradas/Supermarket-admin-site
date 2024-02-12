<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Purchase extends Model
{
    use HasFactory;

    public function Item(): HasOne
    {
        return $this->hasOne(Item::class);
    }

    public function Customer(): HasOne
    {
        return $this->hasOne(Customer::class);
    }
}
