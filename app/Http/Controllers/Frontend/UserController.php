<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\User;
use App\Models\Gender;
use Illuminate\Support\Facades\Auth;
use App\Traits\uploadTrait;

class UserController extends Controller
{

    //this trait is for file uploading
    use uploadTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $user = Auth::user();

        //finding gender of user to show mr or miss befor her name
        $userGenderNumber = $user->gender()->first()->id;
        $userGender = '';
        switch($userGenderNumber)
        {
            case(1):
                $userGender = "سرکار خانم";
                break;
            case(2):
                $userGender = "جناب آقای";
                break;
            case(3):
                $userGender = "خانم/آقای";
                break;
        }
        return view('user.profile')->with([
                                            'user'             => $user,
                                            'userGender'       => $userGender,
                                            'userGenderNumber' => $userGenderNumber,
                                        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    // displaying profile page of user
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $editedUser = User::findOrFail($id);   //finding user based on id

        $request->validate([
            'fullname'    =>  'nullable|string',
            'username'    =>  'required|string',
            'age'         =>  'nullable|numeric',
            'mobile'      =>  'nullable|string|max:20',
            'gender_id'   =>  'nullable|numeric',
            'image'       =>  'nullable|image|mimes:jpeg,png,jpg,gif|max:2049'
        ]);

        $editedUser->fullname   =  $request->input("fullname");
        $editedUser->username   =  $request->input("username");
        $editedUser->age        =  $request->input("age");
        $editedUser->mobile     =  $request->input("mobile");
        $editedUser->gender_id  =  $request->input("gender_id");

        $editedUser->save();

        if($request->hasFile('image'))
        {
            $fileNameToStore = $this->storeImage($request, 'image' ,'public/users');

            if($editedUser->image()->count() == 0)
            {
                $editedUser->image()->create([
                    'image_name' => $fileNameToStore,
                    'image_path' => 'storage/users'
                ]);
            }else{
                $editedUser->image()->delete();
                $editedUser->image()->create([
                    'image_name' => $fileNameToStore,
                    'image_path' => 'storage/users'
                ]);
            }


        }else{
            $fileNameToStore = 'noimage.jpg';
        }



        return redirect()->route('user.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    public function changePassword(Request $request, $id)
    {

    }
}
