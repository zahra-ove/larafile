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


}
