<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Productos extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'categoria_id',
        'marca_id',
        'codigo',
        'nombre',
        'texto',
        'precio',
        'url_youtube',
        'destacar',
        'publicar',
        'promocion',
        'disponible',
        'slug',
    ]; 

    use Sluggable;

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'nombre'
            ]
        ];
    }
}
