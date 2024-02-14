<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * App\Models\Sale
 *
 * @property int $id
 * @property int $quantity
 * @property string $value
 * @property int $customer_id
 * @property int $item_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Customer|null $Customer
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Item> $Items
 * @property-read int|null $items_count
 * @method static \Database\Factories\SaleFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Sale newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Sale newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Sale query()
 * @method static \Illuminate\Database\Eloquent\Builder|Sale whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sale whereCustomerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sale whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sale whereItemId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sale whereQuantity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sale whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sale whereValue($value)
 * @mixin \Eloquent
 */
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
