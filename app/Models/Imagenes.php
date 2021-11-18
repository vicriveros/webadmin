<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Imagenes extends Model
{
    use HasFactory;

    protected $fillable = [
        'relacion_tabla',
        'relacion_id',
        'orden',
        'url',
    ];  

    /*public function getGetImageAttribute(){
        if($this->image){
            return url("storage/$this->image");
        }
    }*/
}
