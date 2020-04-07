<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


use App\Models\File;
use App\Models\Type;
use App\Models\Category;
use App\Traits\uploadTrait;
use App\Http\Requests\StoreFileRequest;
use App\Http\Requests\UpdateFileRequest;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
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
        $files = File::all();

        return view('admin.files.index', compact('files'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $types = Type::all();

        return view('admin.files.create')->with([
                                                'categories' =>  $categories,
                                                'types'      =>  $types
                                                ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreFileRequest $request)
    {
       $data = collect($request->validated())->forget('image')->toArray();
       $file = File::create($data);

       if($request->hasFile('image'))
       {
           $fileNameToStore = $this->storeImage($request, 'image' ,'public/files');

           $file->images()->create([
            'image_name' => $fileNameToStore,
            'image_path' => 'storage/files'
            ]);
       }
    //    else
    //    {
    //        $fileNameToStore = 'noimage.jpg';
    //    }

        return redirect()->route('admin.files.index')->with('status', 'محصول جدید با موفقیت اضافه شد.');
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
        $file = File::find($id);

        $categories = Category::all();
        $types = Type::all();

        return view('admin.files.edit', compact('file'))->with([
                                                                'categories' =>  $categories,
                                                                'types'      =>  $types
                                                                ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateFileRequest $request, $id)
    {
        $data = collect($request->validated())->forget('image')->toArray();
        $file = File::find($id);

        $result = $file->update($data);    //$result shows 1 if update process is successful.

       if($request->hasFile('image'))
       {
           $fileNameToStore = $this->storeImage($request, 'image' ,'public/files');

           $file->images()->create([
            'image_name' => $fileNameToStore,
            'image_path' => 'storage/files'
            ]);
       }

       if($result)
            return redirect()->route('admin.files.index')->with('status', 'اطلاعات محصول با موفقیت ویرایش شد.');
       else
            return redirect()->route('admin.files.index')->with('failed', 'متاسفانه ویرایش اطلاعات محصول با خطا مواجه شد.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $file = File::find($id);

        //if file has any image saved in images table then delete it from storage
        if($file->images->count() > 0)
        {
            foreach($file->images as $image)
            {
                Storage::delete('/public/files/'. $image->image_name);  //delete image
            }

            $file->images()->delete();     //delete file's image from images table
        }

        $file->delete();

        return redirect()->route('admin.files.index')->with('status', 'محصول مورد نظر با موفقیت حذف شد.');
    }
}
