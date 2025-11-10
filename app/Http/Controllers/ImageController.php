<?php

namespace App\Http\Controllers;

use App\Models\CV;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    function view($id) {
        $cv = CV::find($id);
        if($cv == null || 
                $cv->path == null ||
                !file_exists(storage_path('app/public/' . $cv->path))) {
            return response()->file(base_path('public/assets/img/noimage.jpg'));
                }
        return response()->file(storage_path('app/public/' . $cv->path));
    }
}
