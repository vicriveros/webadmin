<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Imagenes;
use App\Models\TemporaryFiles;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImagenesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        foreach ($request->img_file as $imgfile) {
            $temporaryfile = TemporaryFiles::where('filename', $imgfile)->first();

            //guardar
            $img = Imagenes::create([
                'url' => 'images/'.$temporaryfile->filename
            ] + $request->all()); 

            if($temporaryfile){
                Storage::move('imagenes/tmp/'.$temporaryfile->filename, 'public/images/'.$temporaryfile->filename);
                $temporaryfile->delete();
            }
        }
        //volver
        return back()->with('status', 'Archivos subidos correctamente!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Imagenes  $imagenes
     * @return \Illuminate\Http\Response
     */
    public function show(Imagenes $imagenes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Imagenes  $imagenes
     * @return \Illuminate\Http\Response
     */
    public function edit(Imagenes $imagenes)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Imagenes  $imagenes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Imagenes $imagenes)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Imagenes  $imagenes
     * @return \Illuminate\Http\Response
     */
    public function destroy(Imagenes $imagenes)
    {
        //
    }
}
