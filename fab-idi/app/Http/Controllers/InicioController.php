<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Http\Request;
use App\Models\Premio;

class InicioController extends Controller
{
    public function index()
    {
       
        $videos = Video::all();
        $premios = Premio::where('destacado', true)->get();
        return view('inicio', compact('videos'), compact('premios'));
    }
}
