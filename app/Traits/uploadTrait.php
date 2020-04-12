<?php

namespace App\Traits;

use Illuminate\Http\Response;
use Illuminate\Http\Request;


trait uploadTrait
{
    public function storeImage(Request $request, $fieldName, $savingPath)
    {
        //get file name with extension
        $fileNamewithExtension = $request->file($fieldName)->getClientOriginalName();
        //get file name
        $filename = pathinfo($fileNamewithExtension, PATHINFO_FILENAME);
        //get file extension
        $fileExtension = $request->file($fieldName)->getClientOriginalExtension();
        // file name to store
        $fileNameToStore = $filename.'_'.time().'.'.$fileExtension;

        $request->file($fieldName)->storeAs($savingPath, $fileNameToStore);

        return $fileNameToStore;
    }

    public function ImageType(Request $request, $fieldName)
    {
        $type = '';   //type of image if it is "ordinary" size or "banner" size

        $image = $request->file($fieldName);

        $size = getimagesize($image);   //get image size information
        $width = $size[0];   //width of image
        $height = $size[1];  //heigh of image


        if($width == 200  &&  $height == 200)
        {
            $type = 'o';
        }
        elseif($width == 1760 &&  $height == 600)
        {
            $type = 'b';
        }


        return $type;
    }


}
