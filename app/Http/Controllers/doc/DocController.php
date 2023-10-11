<?php

namespace App\Http\Controllers\doc;

use App\Http\Controllers\Controller;
use DirectoryIterator;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DocController extends Controller
{
    public function index()
    {
        $files = File::files('./../DOC');
        rsort($files);
        return view('doc.index', compact(['files']));
        //return Storage::download('folder/file');
    }

    public function getContent($file){
        $files = File::files('./../DOC');
        rsort($files);
        $content = File::get('./../DOC/'.$file);
        return view('doc.content', compact(['files','content']));
    }

}


