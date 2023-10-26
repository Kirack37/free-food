<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class RecipeIngredient extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'recipe_ingredients';
    public function recipe()
    {
        return $this->belongsTo(Recipe::class);
    }
    public function ingredient()
    {
        return $this->belongsTo(Ingredient::class);
    }
        public function store()
    {
        return $this->belongsTo(Store::class, 'ingredient_id');
    }
}
