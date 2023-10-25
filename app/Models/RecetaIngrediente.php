<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class RecetaIngrediente extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'receta_ingredientes';
    public function receta()
    {
        return $this->belongsTo(Receta::class);
    }
    public function ingrediente()
    {
        return $this->belongsTo(Ingrediente::class);
    }
        public function bodega()
    {
        return $this->belongsTo(Bodega::class, 'ingrediente_id');
    }
}
