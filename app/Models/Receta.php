<?php

namespace App\Models;

use App\Models\Ingrediente;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Receta extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'recetas';
    public function ingredientes()
    {
        return $this->belongsToMany(Ingrediente::class, 'receta_ingredientes')->withPivot('cantidad');
    }
}
