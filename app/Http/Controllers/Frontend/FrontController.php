<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


use App\Models\File;
use App\Models\Orderable;
use App\Models\View;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\SearchRequest;


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


        //retrieve all categories
        $categories = Category::all();

        return view('index')->with([
                                    'files'        =>  $files,
                                    'newFiles'     =>  $newFiles,
                                    'categories'   =>  $categories,
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


    //seaching in files
    public function search(SearchRequest $request)
    {
        $query = $request->input('search');
        $categoryId = $request->input('category_id');


        $results = File::seachFiles($query, $categoryId);   //searchig in files based on user's query
        $resultNumber = $results->count();     //number of retrieved results

        return view('searchResult')->with([
                                            'query'         =>  $query,
                                            'results'       =>  $results,
                                            'resultNumber'  => $resultNumber
                                         ]);
    }


    //show products based on received category id
    public function categoryBasedProducts($id)
    {

       $results = File::where('category_id', $id)->get();     //find files that have received category_id

       $resultNumber = $results->count();       //number of retrieved files

       return view('searchResult')->with([
                                            'results'       => $results,
                                            'resultNumber'  => $resultNumber
                                        ]);
    }

}
