<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\uploadimage;
use Illuminate\Http\Request;

class FileUploadController extends Controller
{

    public function fileUpload()
    { // get all date o show in Template
       $products = uploadimage::all();
       return view('fileUpload',compact('products'));
    }
   // file Upload here and save in database
    public function fileUploadPost(Request $request)
    {
    $request->validate([
            'file' => 'required',
        ]);
       // the File convert here to save in database and Folder of Public
        $fileName = time().'.'.$request->file->extension();  
   // image Save in the Public/uploads folder
        $request->file->move(public_path('uploads'), $fileName);
        uploadimage::create([
            'photo' => $fileName
        ]);
   
        return back()
            ->with('success','You have successfully upload file.')
            ->with('file',$fileName);

    }
}