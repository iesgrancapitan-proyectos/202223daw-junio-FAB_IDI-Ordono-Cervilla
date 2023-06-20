<?php

namespace App\Http\Controllers;

use App\Models\Premio;
use Illuminate\Http\Request;



class PremioController extends BaseController
{

    public function guardarPremio(Request $request)
    {
        //Validación url
        if (!empty($request->input('url-premio'))) {
            if (!$this->verfificarUrl($request->input('url-premio'))) {
                return redirect()->route('crear-premio')->with('error', 'La url no es válida.');
            }
        }

        //Validación imagen
        if ($request->hasFile('imagen-premio')) {
            $file = $request->file('imagen-premio');
            $maxSize = 2097152; // 2 megabytes

            if ($file->getSize() > $maxSize) {
                return redirect()->route('crear-premio')->with('error', 'El tamaño de la imagen no puede superar los 2mb.');
            } else {
                $allowedExtensions = ['jpg', 'png', 'jpeg', 'webp'];
                $extension = $file->getClientOriginalExtension();

                if (!in_array($extension, $allowedExtensions)) {
                    return redirect()->route('crear-premio')->with('error', 'La extensiones permitidas son: jpg, png, jpeg o webp.');
                } else {
                    $nombreImagen = '';
                }
            }
        } else {
            $nombreImagen = 'premio-default.webp';
        }

        $premio = Premio::create([
            'titulo' => $request->input('nombre-premio'),
            'fecha' => $request->input('fecha-premio'),
            'descripcion' => $request->input('descripcion-premio'),
            'imagen' => $nombreImagen,
            'url' => $request->input('url-premio'),
            'activo' => true,
            'destacado' => false
        ]);

        //Si lleva imagen le ponemos el nombre del id, la extension y la guardamos en la carpeta
        if ($request->hasFile('imagen-premio')) {
            $nombreImagen = $premio->id . '.' . $extension;
            $premio->imagen = $nombreImagen;
            $premio->save();
            $file->move(public_path('img/premios'), $nombreImagen);
        }

        return redirect()->route('gestion-premios')->with('success', 'El premio se ha creado correctamente.');
    }

    public function mostrarPremios()
    {
        $premios = Premio::all()->where('activo', '1');
        return view('mostrar-premios')->with('premios', $premios);
    }

    public function obtenerPremiosAjax()
    {
        $premios = Premio::all()->where('activo', '1');
        return response()->json($premios);
    }

    public function destacarPremio($id)
    {
        $premio = Premio::find($id);
        $premio->destacado = '1';
        $premio->save();
        return redirect()->route('gestion-premios')->with('success', 'El premio se ha destacado correctamente.');
    }

    public function quitarPremioDestacado(Request $request)
    {
        $premio = Premio::find($request->id);
        //poner destacado a false
        $premio->destacado = false;
        $premio->save();
        return redirect()->route('gestion-premios')->with('success', 'El premio se ha quitado de destacados correctamente.');
    }

    public function crearPremio()
    {
        return view('admin.crear-premio');
    }
    
    public function eliminarPremio($id)
    {
        $premio = Premio::find($id);

        $premio->update(['activo' => 0]);
    
        // Borrar imagen de la carpeta img/premios si no es la imagen por defecto
        if ($premio->imagen != 'premio-default.webp') {
            unlink(public_path('img/premios/' . $premio->imagen));
            $premio->imagen = 'premio-default.webp';
            $premio->save();
        }
        
        return redirect()->route('gestion-premios')->with('success', 'El premio se ha eliminado correctamente.');
    }

    public function editarPremio(Request $request)
    {
        $premio = Premio::find($request->id);
        return view('admin.editar-premio', compact('premio'));
    }

    public function guardarCambiosPremio(Request $request)
    {

        $premio = Premio::find(request()->input('id-premio'));

        //Validación url
        if (!empty($request->input('url-premio'))) {
            if (!$this->verfificarUrl($request->input('url-premio'))) {
                return redirect()->route('crear-premio')->with('error', 'La url no es válida.');
            }
        }

        //Validación imagen
        if ($request->hasFile('imagen-premio')) {
            $file = $request->file('imagen-premio');
            $maxSize = 2097152; // 2 megabytes 2097152

            if ($file->getSize() > $maxSize) {
                return redirect()->to('gestion-premios/editar/' . $premio->id)->with('error', 'El tamaño de la imagen no puede superar los 2mb.');
            } else {
                $allowedExtensions = ['jpg', 'png', 'jpeg', 'webp'];
                $extension = $file->getClientOriginalExtension();

                if (!in_array($extension, $allowedExtensions)) {
                    return redirect()->to('gestion-premios/editar/' . $premio->id)->with('error', 'La extensiones permitidas son: jpg, png, jpeg o webp.');
                } else {
                    $nombreImagen = '';
                }
            }
        } else {
            $nombreImagen = 'premio-default.webp';
        }

        $premio->titulo = $request->input('titulo-premio');
        $premio->fecha = $request->input('fecha-premio');
        $premio->url = $request->input('url-premio');
        $premio->descripcion = $request->input('descripcion-premio');
        $premio->imagen = $nombreImagen;
        $premio->save();


        //Si lleva imagen le ponemos el nombre del id, la extension y la guardamos en la carpeta
        if ($request->hasFile('imagen-premio')) {
            $nombreImagen = $premio->id . '.' . $extension;
            $premio->imagen = $nombreImagen;
            $premio->save();
            $file->move(public_path('img/premios'), $nombreImagen);
        }
        
        return redirect()->route('gestion-premios')->with('success', 'El premio se ha editado correctamente.');
    }


    public function gestionPremios()
    {
        $premiosDestacados = Premio::where('activo', 1)
            ->where('destacado', 1)
            ->get();

        return view('admin/gestion-premios')->with('premiosDestacados', $premiosDestacados);
    }
}
