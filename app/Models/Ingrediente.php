<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Ingrediente extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'ingredientes';
    public function recetas()
    {
        return $this->belongsToMany(Receta::class, 'receta_ingredientes')->withPivot('cantidad');
    }
}
