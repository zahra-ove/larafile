<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\RatingRequest;
use Illuminate\Http\Request;


use App\Models\File;
use App\Models\Orderable;
use App\Models\View;
use App\Models\Rate;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\SearchRequest;
use RealRashid\SweetAlert\Facades\Alert;   //sweet alert Facade

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


        // count rate number fot this file
        $rateCount = Rate::CountRate('App\Models\File', $id);

        // if there is at least one record then continue to query the results
        if($rateCount)
        {
            //retrieve all rates related to this file and calculate average of them
            $avgrate = Rate::AverageRate('App\Models\File', $id);
        }
        else
        {
            $avgrate = null;
        }

        #for every click on each product, fill views table
        //start ------------------------------ //
        if(Auth::check())
        {
            $userId = Auth::id();   //retrieve user id

            //save this view of user from this file in viees table
            $file->views()->create([
                'user_id' => $userId
            ]);

            if($rateCount)
            {
                //search if user has rated to this file or not
                $q = Rate::where('user_id',$userId)
                                ->where('rateble_type', 'App\Models\File')
                                ->where('rateble_id', $id)
                                ->first();
                if($q === null)
                {
                    $userRate = null;   //if user has not rated to this file then return null
                }
                else
                {
                    $userRate = $q->pluck('star')->first();   //if user has rated to this file, then return user's rate
                }
            }
            else
            {
                $userRate = null;
                // example:
                // alert()->success('SuccessAlert','Lorem ipsum dolor sit amet.');

            }
        }
        else
        {
            $file->views()->create([]);

            //if user is not loggedin then no rate exists
            $userRate = null;
        }
        //end ---------------------------------- //

        return view('product')->with([
                                        'file'      => $file,
                                        'avgrate'   => round( $avgrate , 2),
                                        'rateCount' => $rateCount,
                                        'userRate'  => $userRate
                                    ]);
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


    //star rating
    public function receivedRating(RatingRequest $request)
    {

        // store received request in variables for better understaning
        $rateble_id = $request->id;
        $rateble_type = 'App\Models\\' . ucfirst($request->rateType);
        $star = $request->rateNum;
        $message = '';

        //check if user is logged in or not
        if(Auth::check())
        {
            $user_id = Auth::id();   //if user is logged in then return user's Id
            // check if user has retaed to this file,article,episode in the past
            $result = Rate::where('rateble_id', $rateble_id)
                            ->where('rateble_type', $rateble_type)
                            ->where('user_id', $user_id)
                            ->exists();


            if($result)   //if current user(logged in user) has rated to this file,article,episode in the past, then update her rating in rates table
            {
                Rate::where('rateble_id', $rateble_id)
                                ->where('rateble_type', $rateble_type)
                                ->where('user_id', $user_id)
                                ->update(['star'=> $star]);


                $avgRate = Rate::AverageRate($rateble_type, $rateble_id);  //recalculate average rate for specified file,episode,article after updating the user's rate
                $countRate = Rate::CountRate($rateble_type, $rateble_id); //number of rates for this specific item

                // Alert::warning('Warning Title', 'امتیاز شما به روز رسانی شد');  //if user is not logged in then return alert message to login ot resiter

                $message = 'امتیاز شما به روز رسانی شد.';
            }
            else // if current user does not have any rate for this file or etc,.. then save her rating.
            {
                Rate::create([
                    'rateble_id'   =>  $rateble_id,
                    'rateble_type' =>  $rateble_type,
                    'user_id'      =>  $user_id,
                    'star'         =>  $star
                ]);

                $avgRate = Rate::AverageRate($rateble_type, $rateble_id);   //recalculate average rate for specified file,episode,article after adding the user's rate
                $countRate = Rate::CountRate($rateble_type, $rateble_id);   //number of rates for this specific item

                // Alert::warning('Warning Title', 'امتیاز شما با موفقیت ثبت شد');  //if user is not logged in then return alert message to login ot resiter
                $message = 'امتیاز شما با موفقیت ثبت شد.';
            }

            return response()->json([
                                        'avgRate'   => $avgRate,
                                        'countRate' => $countRate,
                                        'userRate'  => $star,
                                        'message'   => $message
                                    ]);

        }
        else  // if user is not logged in then return alert message that signout or signin is required for rating
        {
            $message = 'برای ثبت امتیازتون لطفا در سایت ثبت نام کنید';
            return response()->json([
                                    'avgRate'   => null,
                                    'countRate' => null,
                                    'userRate'  => null,
                                    'message'   => $message
                                ]);
        }

    }

}
