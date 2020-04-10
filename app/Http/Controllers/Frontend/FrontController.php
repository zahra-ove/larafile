<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


use App\Models\File;
use App\Models\Orderable;


class FrontController extends Controller
{
    public function index()
    {
        $files = File::all();    //retrieve all files
        $newFiles = File::orderBy('created_at', 'desc')->limit(8)->get();  //retrieve 5 latest product that is added to website
        
        $topTenSoldFileId = Orderable::topTenSeller('File');   //finding top ten sold files in last three months based on file Id
        $topsoldFiles = File::findMany($topTenSoldFileId);  //finding top ten sold files in last three months based on file object

        return view('index')->with([
                                    'files'        =>  $files,
                                    'newFiles'     =>  $newFiles,
                                    'topsoldFiles' =>  $topsoldFiles
                                ]);
    }
}
