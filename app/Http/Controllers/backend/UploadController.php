<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TemporaryFiles;

class UploadController extends Controller
{
    public function store(Request $request){
        if($request -> hasFile('img_file')){
            $file = $request->file('img_file');
            $path = $file[0]->store('imagenes/tmp');
            $filename = substr($path, 13);

            TemporaryFiles::create([ 'filename' => $filename ]);

            return $filename;
        }
        return '';
    }
}
