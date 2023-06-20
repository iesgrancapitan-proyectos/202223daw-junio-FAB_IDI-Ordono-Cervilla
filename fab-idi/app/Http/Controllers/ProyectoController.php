<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Proyecto;
use App\Models\CursoAcademico;
use Faker\Provider\Base;

class ProyectoController extends BaseController
{

    public function eliminarProyecto($id)
    {
        $proyecto = Proyecto::find($id);

        $proyecto->update(['activo' => 0]);

        // Borrar imagen de la carpeta img/premios si no es la imagen por defecto
        if ($proyecto->imagen != 'proyecto-default.webp') {
            unlink(public_path('img/proyectos/' . $proyecto->imagen));
            $proyecto->imagen = 'proyecto-default.webp';
            $proyecto->save();
        }

        if ($proyecto->tipo_proyecto_id == '1') {
            return redirect()->route('gestion-proyectos-pip')->with('success', 'El proyecto se ha eliminado correctamente.');
        } else {
            return redirect()->route('gestion-proyectos-intercentros')->with('success', 'El proyecto se ha eliminado correctamente.');
        }
    }

    public function quitarProyectoDestacado($id)
    {
        $proyecto = Proyecto::find($id);
        $proyecto->destacado = '0';
        $proyecto->save();

        if ($proyecto->tipo_proyecto_id == '1') {
            return redirect()->route('gestion-proyectos-pip');
        } else {
            return redirect()->route('gestion-proyectos-intercentros');
        }
    }


    public function destacarProyecto($id)
    {
        $proyecto = Proyecto::find($id);
        $proyecto->destacado = '1';
        $proyecto->save();

        if ($proyecto->tipo_proyecto_id == '1') {
            return redirect()->route('gestion-proyectos-pip');
        } else {
            return redirect()->route('gestion-proyectos-intercentros');
        }
    }

    public function guardarCambiosProyecto(Request $request)
    {
        $proyecto = Proyecto::find(request()->input('id-proyecto'));

        //Validación url
        if (!empty($request->input('url-proyecto'))) {
            
            if (!$this->verfificarUrl($request->input('url-proyecto'))) {
                
                return redirect()->to('gestion-proyectos/editar/' . $proyecto->id)->with('success', 'La url no es válida.');
            }
        }

        //Validación imagen
        if ($request->hasFile('imagen-proyecto')) {
            $file = $request->file('imagen-proyecto');
            $maxSize = 2097152; // 2 megabytes 2097152

            if ($file->getSize() > $maxSize) {
                return redirect()->to('gestion-proyectos/editar/' . $proyecto->id)->with('error', 'El tamaño de la imagen no puede superar los 2mb.');
            } else {
                $allowedExtensions = ['jpg', 'png', 'jpeg', 'webp'];
                $extension = $file->getClientOriginalExtension();

                if (!in_array($extension, $allowedExtensions)) {
                    return redirect()->to('gestion-proyectos/editar/' . $proyecto->id)->with('error', 'La extensiones permitidas son: jpg, png, jpeg o webp.');
                } else {
                    $nombreImagen = '';
                }
            }
        } else {
            $nombreImagen = 'proyecto-default.webp';
        }

        $proyecto->nombre = $request->input('nombre-proyecto');
        $proyecto->autor = $request->input('autor-proyecto');
        $proyecto->centro = $request->input('centro-proyecto');
        $proyecto->curso_academico_id = $request->input('select-curso-academico');
        $proyecto->tipo_proyecto_id = $request->input('select-tipo-proyecto');
        $proyecto->descripcion = $request->input('descripcion-proyecto');
        $proyecto->disponible = $request->input('disponible') == '1' ? true : false;
        $proyecto->url = $request->input('url-proyecto');
        $proyecto->imagen = $nombreImagen;
        $proyecto->save();

        //Si lleva imagen le ponemos el nombre del id, la extension y la guardamos en la carpeta
        if ($request->hasFile('imagen-proyecto')) {
            $nombreImagen = $proyecto->id . '.' . $extension;
            $proyecto->imagen = $nombreImagen;
            $proyecto->save();
            $file->move(public_path('img/proyectos'), $nombreImagen);
        }

        if ($proyecto->tipo_proyecto_id == '1') {
            return redirect()->route('gestion-proyectos-pip')->with('success', 'El proyecto se ha actualizado correctamente.');
        } else {
            return redirect()->route('gestion-proyectos-intercentros')->with('success', 'El proyecto se ha actualizado correctamente.');
        }
    }

    public function editarProyecto($id)
    {
        $proyecto = Proyecto::find($id);
        $cursosAcademicos = CursoAcademico::all();
        return view('admin/editar-proyecto', compact('proyecto', 'cursosAcademicos'));
    }

    public function crearProyecto()
    {
        $cursosAcademicos = CursoAcademico::all();
        return view('admin.crear-proyecto', compact('cursosAcademicos'));
    }

    public function guardarProyecto(Request $request)
    {
        //Validación url
        if (!empty($request->input('url-proyecto'))) {
            if (!$this->verfificarUrl($request->input('url-proyecto'))) {
                return redirect()->route('gestion-proyectos/crear')->with('error', 'La url no es válida.');
            }
        }

        //Validación imagen
        if ($request->hasFile('imagen-proyecto')) {
            $file = $request->file('imagen-proyecto');
            $maxSize = 2097152; // 2 megabytes

            if ($file->getSize() > $maxSize) {
                return redirect()->route('crear-proyecto')->with('error', 'El tamaño de la imagen no puede superar los 2mb.');
            } else {
                $allowedExtensions = ['jpg', 'png', 'jpeg', 'webp'];
                $extension = $file->getClientOriginalExtension();

                if (!in_array($extension, $allowedExtensions)) {
                    return redirect()->route('crear-proyecto')->with('error', 'La extensiones permitidas son: jpg, png, jpeg o webp.');
                } else {
                    $nombreImagen = '';
                }
            }
        } else {
            $nombreImagen = 'proyecto-default.webp';
        }

        $proyecto = Proyecto::create([
            'nombre' => $request->input('nombre-proyecto'),
            'autor' => $request->input('autor-proyecto'),
            'centro' => $request->input('centro-proyecto'),
            'curso_academico_id' => $request->input('select-curso-academico'),
            'tipo_proyecto_id' => $request->input('select-tipo-proyecto'),
            'descripcion' => $request->input('descripcion-proyecto'),
            'destacado' => '0',
            'disponible' => $request->input('disponible') == '1' ? true : false,
            'url' => $request->input('url-proyecto'),
            'imagen' => $nombreImagen,
            'activo' => '1',
        ]);

        //Si lleva imagen le ponemos el nombre del id, la extension y la guardamos en la carpeta
        if ($request->hasFile('imagen-proyecto')) {
            $nombreImagen = $proyecto->id . '.' . $extension;
            $proyecto->imagen = $nombreImagen;
            $proyecto->save();
            $file->move(public_path('img/proyectos'), $nombreImagen);
        }

        if ($proyecto->tipo_proyecto_id == '1') {
            return redirect()->route('gestion-proyectos-pip')->with('success', 'El proyecto se ha creado correctamente.');
        } else {
            return redirect()->route('gestion-proyectos-intercentros')->with('success', 'El proyecto se ha creado correctamente.');
        }
    }

    public function obtenerCursoAcademicoAjax()
    {
        $cursos = CursoAcademico::all();
        return response()->json($cursos);
    }

    public function obtenerProyectosAjax()
    {
        $proyecto = Proyecto::all()->where('activo', '1');
        return response()->json($proyecto);
    }

    public function gestionProyectosIntercentros()
    {
        $proyectosDestacados = Proyecto::where('tipo_proyecto_id', '2')->where('activo', '1')->where('destacado', '1')->get();
        $cursosAcademicos = CursoAcademico::all();

        return view('admin.gestion-proyectos-intercentros', compact('proyectosDestacados', 'cursosAcademicos'));
    }


    public function gestionProyectosPip()
    {

        $proyectosDestacados = Proyecto::where('tipo_proyecto_id', '1')->where('activo', '1')->where('destacado', '1')->get();
        $cursosAcademicos = CursoAcademico::all();

        return view('admin.gestion-proyectos-pip', compact('proyectosDestacados', 'cursosAcademicos'));
    }
}
