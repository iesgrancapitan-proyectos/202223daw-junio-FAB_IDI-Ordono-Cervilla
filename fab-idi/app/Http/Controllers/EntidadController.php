<?php

namespace App\Http\Controllers;
use App\Models\Entidad;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;


class EntidadController extends Controller
{
    public function guardarCambiosEntidad(Request $request)
    {
        $entidad = Entidad::find($request->input('id-entidad'));

        //Validación de la imagen
        if ($request->hasFile('imagen-entidad')) {
            $file = $request->file('imagen-entidad');
            $maxSize = 2097152;

            if ($file->getSize() > $maxSize) {
                return redirect()->route('editar-entidad', $entidad->id)->with('error', 'La imagen no puede superar los 2MB');
            } else {
                $allowedExtensions = ['jpg', 'png', 'jpeg', 'webp'];
                $extension = $file->getClientOriginalExtension();

                if (!in_array($extension, $allowedExtensions)) {
                    return redirect()->route('editar-entidad', $entidad->id)->with('error', 'La imagen debe ser jpg, png, jpeg o webp');
                } else {
                    $nombreImagen = '';
                }
            }
        } else {
            $nombreImagen = $entidad->imagen;
        }

        $entidad->nombre = $request->input('nombre-entidad');
        $entidad->representante = $request->input('representante-entidad');
        $entidad->colaborador_id = $request->input('select-tipo-colaborador-entidad');
        $entidad->telefono = $request->input('telefono-entidad');
        $entidad->web = $request->input('web-entidad');
        $entidad->imagen = $nombreImagen;
        $entidad->save();

        //Si lleva imagen le ponemos el nombre del id, la extension y la guardamos en la carpeta
        if ($request->hasFile('imagen-entidad')) {
            // Borrar imagen de la carpeta img/premios si no es la imagen por defecto

            if ($entidad->imagen != 'entidad-default.webp') {
                $filePath = public_path('img/entidades/' . $entidad->imagen);
            
                if (File::exists($filePath)) {
                    File::delete($filePath);
                }
            }
            
            $nombreImagen = $entidad->id . '.' . $extension;
            $entidad->imagen = $nombreImagen;
            $entidad->save();
            $file->move(public_path('img/entidades'), $nombreImagen);
        }
        return redirect()->route('gestion-entidades')->with('mensaje', 'Usuario actualizado correctamente');
    }

    public function editarEntidad($id)
    {
        $entidad = Entidad::find($id);

        return view('admin/editar-entidad', compact('entidad'));
    }

    public function eliminarEntidad($id)
    {
        Entidad::where('id', $id)->update(['activo' => 0]);

        $entidad = Entidad::find($id);
        if ($entidad->imagen != 'entidad-default.webp') {
            unlink(public_path('img/entidades/' . $entidad->imagen));
            $entidad->imagen = 'entidad-default.webp';
            $entidad->save();
        }

        Entidad::where('id', $id)->update([
            'activo' => 0,
            'imagen' => 'entidad-default.webp'
        ]);

        return redirect('gestion-entidades')->with('success', 'Entidad eliminada correctamente');
    }

    public function obtenerEntidadesAjax()
    {
        $entidades = Entidad::all()->where('activo', '1');
        return response()->json($entidades);
    }

    public function gestionEntidades()
    {
        return view("admin/gestion-entidades");
    }
}
