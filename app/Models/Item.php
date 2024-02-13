<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Builder;

class Item extends Model
{
    use HasFactory;

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
