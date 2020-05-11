<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    /**
     * this method is to modify images in admin panel
     */
    public function destroy($id)
    {

      $image = Image::find($id);  // find image based on id
      $image_path = str_replace("storage", "public", $image->image_path);  //finding image path in storage
      Storage::delete($image_path.'/'.$image->image_name);  //delete image from storage

      $image->delete();  // and finally delete image from database

      return redirect()->back()->with('status', 'تصویر موردنظر با موفقیت حذف شد!');
    }
}
