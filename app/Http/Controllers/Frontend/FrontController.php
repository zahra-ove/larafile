<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


use App\Models\File;
use App\Models\Orderable;
use App\Models\View;
use Illuminate\Support\Facades\Auth;

class FrontController extends Controller
{
    public function index()
    {
        $files = File::all();    //retrieve all files
        $newFiles = File::orderBy('created_at', 'desc')->limit(8)->get();  //retrieve 5 latest product that is added to website

        $topTenSoldFileId = Orderable::topTenSeller('File');   //finding top ten sold files in last three months based on file Id
        $topsoldFiles = File::findMany($topTenSoldFileId);  //finding top ten sold files in last three months based on file object

        // finding top 10 popular products based on click count
        $popularFilesId = View::mostviewedfiles()->pluck('viewable_id');
        // return $popularFilesId;
        $popularFiles = File::findMany($popularFilesId);  //finding top ten popular files in last three months based on file ID

        return view('index')->with([
                                    'files'        =>  $files,
                                    'newFiles'     =>  $newFiles,
                                    'topsoldFiles' =>  $topsoldFiles,
                                    'popularFiles' =>  $popularFiles
                                ]);
    }


    public function showFile($id)
    {

        #finding specified file based on Id
        $file = File::find($id);

        #for every click on each product, fill views table
        //start ------------------------------ //
        if(Auth::check())
        {
            $id = Auth::id();
            $file->views()->create([
                'user_id' => $id
            ]);
        }
        else
        {
            $file->views()->create([]);
        }
        //end ---------------------------------- //

        return view('product', compact('file'));
    }
}
