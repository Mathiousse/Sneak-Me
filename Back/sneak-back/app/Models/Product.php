<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'stock',
        'price',
        'category_id',
        'image'
    ];
    protected $attributes = [
        'description' => 'Description du produit',
    ];
    public function categories()
{
    return $this->belongsToMany(Category::class);
}
}