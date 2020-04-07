<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


use App\Models\File;


class FrontController extends Controller
{
    public function index()
    {
        $files = File::all();    //retrieve all files
        $newFiles = File::orderBy('created_at', 'desc')->limit(8)->get();  //retrieve 5 latest product

        return view('index')->with([
                                    'files'    => $files,
                                    'newFiles' => $newFiles
                                ]);



    }
}
