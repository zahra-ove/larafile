<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


use App\User;
use App\Models\Image;
use App\Http\Requests\storeUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Traits\uploadTrait;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{

//---------- including traits here -----------------//
    use uploadtrait;
// -------------------------------------------------//


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();     //get all users from database
        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserRequest $request)
    {

        $user = new User();
        $user->fullname  =  $request->fullname;
        $user->username  =  $request->username;
        $user->email     =  $request->email;
        $user->age       =  $request->age;
        $user->mobile    =  $request->mobile;
        $user->gender_id =  $request->gender_id;
        $user->save();


        if($request->hasFile('image'))
        {
            $fileNameToStore = $this->storeImage($request, 'image' ,'public/users');

            if($user->image()->count() == 0)
            {
                $user->image()->create([
                    'image_name' => $fileNameToStore,
                    'image_path' => 'storage/users'
                ]);
            }else{
                $user->image()->delete();
                $user->image()->create([
                    'image_name' => $fileNameToStore,
                    'image_path' => 'storage/users'
                ]);
            }
        }
        else
        {
            $fileNameToStore = 'noimage.jpg';
        }
        return redirect()->route('admin.users.index')->with('status', 'کاربر جدید با موفقیت افزوده شد.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);

        return view('admin.users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, $id)
    {

         $user = User::find($id);
         $user->fullname  =  $request->fullname;
         $user->username  =  $request->username;
         $user->age       =  $request->age;
         $user->mobile    =  $request->mobile;
         $user->gender_id =  $request->gender_id;
         $user->save();



        if($request->hasFile('image'))
        {
            $fileNameToStore = $this->storeImage($request, 'image' ,'public/users');

            if($user->image()->count() == 0)
            {
                $user->image()->create([
                    'image_name' => $fileNameToStore,
                    'image_path' => 'storage/users'
                ]);
            }else{
                $user->image()->delete();
                $user->image()->create([
                    'image_name' => $fileNameToStore,
                    'image_path' => 'storage/users'
                ]);
            }
        }
        else
        {
            $fileNameToStore = 'noimage.jpg';
        }



        return redirect()->route('admin.users.index')->with('status', 'اطلاعات کاربر با موفقیت ویرایش شد.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);    //finding user based in ID
        $user->roles()->detach();        // delete roles of this user from role-user pivot table


        //if user has any image saved in images table then delete it from storage
        if(isset($user->image))
        {
            if($user->image->image_name != 'noimage.jpg'){
                Storage::delete('/public/users/'. $user->image->image_name);  //delete image
            }
            $user->image()->delete();     //delete user's image from images table
        }


        $user->delete();  //finally delete the user

        return redirect()->route('admin.users.index')->with('status', 'کاربر با موفقیت حذف شد.');
    }
}
