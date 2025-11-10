<?php

namespace App\Http\Controllers;

use App\Models\CV;
use Illuminate\Http\Request;
use Illuminate\View\View;

class MainController extends Controller
{
    function index():View {
        $cvs = CV::all();
        foreach($cvs as $cv) {
            $url = asset('assets/img/noimage.jpg');
            if($cv->path != null) {
                $url = asset('storage/' . $cv->path);
            }
            $cv->newPath = $url;
        }
        $array = ['cvs' => $cvs];
        return view('main.index', $array);
    }
}
