<?php

namespace App\Http\Controllers;
use App\Models\File;
use Illuminate\Http\Request;

class FileUpload extends Controller
{

    public function createForm(){
        return view('file-upload');
      }
    //
    public function fileUpload(Request $request)
    {
        $request->validate(['file' => 'required|mimes:csv,txt,xlx,xls,pdf|max:2048']);

    }
}
