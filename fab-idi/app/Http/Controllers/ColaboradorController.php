<?php

namespace App\Http\Controllers;

use App\Models\Colaborador;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Entidad;

class ColaboradorController extends Controller
{
    public function index()
    {
        $embajadores = User::where('id_colaborador', '2')->where('activo', '1')->get();
        $mentores = User::where('id_colaborador', '3')->where('activo', '1')->get();
        $institutos = Entidad::where('colaborador_id', '4')->where('activo', '1')->get();
        return view("panel-colaboradores")->with('embajadores', $embajadores)->with('mentores', $mentores)->with('institutos', $institutos);
    }

    public function colaboradores()
    {
        return view('admin/colaboradores');
    }

    public function gestionColaboradores()
    {
        return view('admin/gestion-colaboradores');
    }

    public function crearColaborador($id, $tipoColaborador)
    {

        $usuario = User::find($id);
        $usuario->id_colaborador = $tipoColaborador;
        $usuario->save();

        return redirect()->route('gestion-colaboradores');
    }

    public function eliminarColaboradorPost($id)
    {
        $usuario = User::find($id);
        $usuario->id_colaborador = null;
        $usuario->save();

        return redirect()->route('gestion-colaboradores');
    }

    // public function crearColaboradorPost(Request $request)
    // {

    //     if ($request->isMethod('post')) {
    //         // Lanzar mensaje de error si no se han completado los campos obligatorios
    //         if (!$request->has('nombre') || !$request->has('tipoColaborador')) {
    //             return back()->with('error', 'Rellena por favor los campos obligatorios.');
    //         }

    //         $nombre = $request->input('nombre');
    //         $tipoColaborador = $request->input('tipoColaborador');
    //         $descripcion = $request->input('descripcion');
    //         $instagram = $request->input('instagram');
    //         $twitter = $request->input('twitter');
    //         $linkedin = $request->input('linkedin');
    //         $web = $request->input('web');

    //         /*Almacenamiento*/
    //         $colaborador = new Colaborador;
    //         $colaborador->nombre = $nombre;
    //         $colaborador->tipoColaborador = $tipoColaborador;
    //         $colaborador->descripcion = $descripcion;
    //         $colaborador->instagram = $instagram;
    //         $colaborador->twitter = $twitter;
    //         $colaborador->linkedin = $linkedin;
    //         $colaborador->web = $web;
    //         $colaborador->save();

    //         /*Obtener el último id*/
    //         $ultimoId = Colaborador::all()->last()->id;

    //         if ($request->hasFile('imagen')) {
    //             $imagen = $request->file('imagen');
    //             //$nombreOriginal = $imagen->getClientOriginalName();
    //             $extension = $imagen->getClientOriginalExtension();

    //             /*Configurar el nombre de la foto con el id*/
    //             $nombreFoto = $ultimoId . '.' . $extension;

    //             // Guardar la imagen con el nuevo nombre
    //             $imagen->move(public_path('images/colaboradores/'), $nombreFoto);

    //             // Guardar el nombre de la imagen en la base de datos
    //             $colaborador->imagen = $nombreFoto;
    //             //$colaborador->save();
    //         } else {
    //             $nombreFoto = 'imagen-colaborador-defecto.png';
    //             $colaborador->imagen = $nombreFoto;
    //             //$colaborador->save();
    //         }
    //     }
    //     return view('admin/crear-colaborador')->with('success', 'El colaborador se ha creado correctamente.');
    // }

    // public function crearColaborador(Request $request)
    // {

    //     return view('admin/crear-colaborador');
    // }

}
