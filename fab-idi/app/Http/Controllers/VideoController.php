<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Http\Request;

class VideoController extends Controller
{

    public function actualizarVideo(Request $request)
    {
        $video = Video::find($request->id);

        $nombre = $request->input('nombre');
        $url = $request->input('url');

        // Verificar si la URL es válida
        $url_pattern = '/^(https?\:\/\/)?(www\.)?(youtube\.com|youtu\.?be)\/.+/';
        if (!preg_match($url_pattern, $url)) {
            return redirect()->back()->with('error', 'La URL del video no es válida.');
        }

         // Convertir la URL al formato embebido
        $videoId = $this->getVideoIdFromUrl($url);
        $embeddedUrl = "https://www.youtube.com/embed/{$videoId}";

        // Actualizar los datos del video
        $video->nombre = $nombre;
        $video->url = $embeddedUrl;
        $video->save();

        return redirect()->route('gestion-videos')->with('success', 'El video se ha actualizado correctamente.');
    }

    /**
     * que extrae el ID del video desde la URL proporcionada. Luego, se utiliza este ID para construir la URL embebida en la variable $embeddedUrl. 
     * Finalmente, se actualizan los datos del video utilizando la URL embebida.
     * 
     */ 
    private function getVideoIdFromUrl($url)
    {
        $videoId = '';
    
        // Obtener el ID del video desde la URL
        $urlParts = parse_url($url);
        if (isset($urlParts['query'])) {
            parse_str($urlParts['query'], $query);
            if (isset($query['v'])) {
                $videoId = $query['v'];
            }
        } elseif (preg_match('/\/embed\/([A-Za-z0-9\-_]+)/', $url, $matches)) {
            $videoId = $matches[1];
        }
    
        return $videoId;
    }

    public function editarVideos($id)
    {
        $video = Video::find($id);

        return view('admin/editar-videos')->with('video', $video);
    }


    public function gestionVideos()
    {
        $videos = Video::all();
        return view('admin/gestion-videos')->with('videos', $videos);
    }
}
