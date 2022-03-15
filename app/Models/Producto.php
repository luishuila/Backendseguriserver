<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Categoria;
class Producto extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombre',
        'slug',
        'descripcion',
        'categoria_id',
        'precio'
    ];

    public function Categoria()
    {
        return $this->hasMany(Categoria::class); 
    }
}
