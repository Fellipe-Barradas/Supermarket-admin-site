<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * App\Models\Purchase
 *
 * @property int $id
 * @property int $quantity
 * @property string $value
 * @property int $customer_id
 * @property int $item_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Customer|null $Customer
 * @property-read \App\Models\Item|null $Item
 * @method static \Database\Factories\PurchaseFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Purchase newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Purchase newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Purchase query()
 * @method static \Illuminate\Database\Eloquent\Builder|Purchase whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Purchase whereCustomerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Purchase whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Purchase whereItemId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Purchase whereQuantity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Purchase whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Purchase whereValue($value)
 * @mixin \Eloquent
 */
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
