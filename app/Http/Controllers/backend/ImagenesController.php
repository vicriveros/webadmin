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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        foreach ($request->img_file as $imgfile) {
            //calcular orden
            $imgs = Imagenes::where('relacion_tabla', $request->relacion_tabla)
                ->where('relacion_id', $request->relacion_id)
                ->get()
                ->count();
            $orden = $imgs + 1;

            //guardar
            $temporaryfile = TemporaryFiles::where('filename', $imgfile)->first();
            $img = Imagenes::create([
                'orden' => $orden,
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Imagenes  $imagenes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $imagen = Imagenes::find($id);

        if ($request->order == 'up'){
            $order1=$imagen->orden - 1; 
            $order2=$imagen->orden;
        }else if ($request->order == 'down'){
            $order1=$imagen->orden + 1; 
            $order2=$imagen->orden;
        }

        $cant = Imagenes::where('relacion_tabla', $imagen->relacion_tabla)
                ->where('relacion_id', $imagen->relacion_id)
                ->get()
                ->count();

        if(($order1 > 0) and ($order1 <= $cant)){
          $imagen->update(['orden' => $order1]);

        Imagenes::where('relacion_tabla', $imagen->relacion_tabla)
            ->where('relacion_id', $imagen->relacion_id)
            ->where('orden', $order1)
            ->where('id', '!=', $id)
            ->update(['orden' => $order2]);  
        }
        
        return back()->with('status', 'Orden Actualizado!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Imagenes  $imagenes
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $imagenes = Imagenes::find($id);
        
        //eliminar img
        Storage::disk('public')->delete($imagenes->url);

        $imagenes->delete();
        return back()->with('status', 'Imagen eliminada correctamente!');
    }
}
