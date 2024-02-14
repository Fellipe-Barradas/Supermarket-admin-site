<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Builder;

/**
 * App\Models\Item
 *
 * @property int $id
 * @property string $name
 * @property int $estoque
 * @property string $imagem_url
 * @property string $preco
 * @property string $descricao
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Category> $categories
 * @property-read int|null $categories_count
 * @property-read \App\Models\Sale|null $purchase
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Sale> $sale
 * @property-read int|null $sale_count
 * @method static \Database\Factories\ItemFactory factory($count = null, $state = [])
 * @method static Builder|Item filter(array $filters)
 * @method static Builder|Item newModelQuery()
 * @method static Builder|Item newQuery()
 * @method static Builder|Item query()
 * @method static Builder|Item whereCreatedAt($value)
 * @method static Builder|Item whereDescricao($value)
 * @method static Builder|Item whereEstoque($value)
 * @method static Builder|Item whereId($value)
 * @method static Builder|Item whereImagemUrl($value)
 * @method static Builder|Item whereName($value)
 * @method static Builder|Item wherePreco($value)
 * @method static Builder|Item whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Item extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'estoque',
        'imagem_url',
        'preco',
        'descricao'
    ];

    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class);
    }

    public function sale(): BelongsToMany
    {
        return $this->belongsToMany(Sale::class);
    }

    public function purchase(): BelongsTo
    {
        return $this->belongsTo(Sale::class);
    }

    public function scopeFilter(Builder $query, array $filters)
    {
        $query
            ->when($filters['name'] ?? false, function($query, $name){
            $query->where('name', 'like', '%' . $name . '%')
                ->orWhere('descricao', 'like', '%' . $name . '%');
            })
            ->when($filters['category'] ?? false, function($query, $category){
            $query
                ->whereHas('categories', function($query) use ($category){
                $query->where('categories.id', $category);
            });
        });
    }
}
