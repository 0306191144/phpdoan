<?php

namespace App\Traits;
use Storage;
trait StorageImage{
 
    public function StroageImgupload( $request, $fileName, $Path)
{
    if($request->hasFile($fileName))
   {
     $file=$request->$fileName;
    $fileNameOriginal =$file->getClientOriginalName();
    $fileNameHash =$file->hashName();
    $path = $request->file(key:$fileName)->storeAs( path:"public/".$Path, name:  $fileNameHash);

    $data =[
        'name' => $fileNameOriginal,
        'path'=>Storage::url($path)
    ];
   return $data;
}
else return null;
}


public function StroageImguploadMuti( $file, $Path)
{
 
    $fileNameOriginal =$file->getClientOriginalName();
    $fileNameHash =$file->hashName();
    $path =  $file->storeAs( path:"public/".$Path, name:  $fileNameHash);

    $data =[
        'name' => $fileNameOriginal,
        'path'=>Storage::url($path)
    ];
    
    return $data;
}
}