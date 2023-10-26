<?php

namespace App\Models;

use App\Models\Ingredient;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Store extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'store';
    public function ingredient()
    {
        return $this->hasOne(Ingredient::class, 'id');
    }
}
