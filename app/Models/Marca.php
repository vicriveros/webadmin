<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Marca extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'habilitar',
        'slug',
        'texto',
        'publicar',
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
