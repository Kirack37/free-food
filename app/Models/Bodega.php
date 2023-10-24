<?php

namespace App\Models;

use App\Models\Ingrediente;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Bodega extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'bodega';
    public function ingrediente()
    {
        return $this->belongsTo(Ingrediente::class);
    }
}
