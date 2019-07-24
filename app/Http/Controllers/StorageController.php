<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\NewsAttachment;

class StorageController extends Controller
{
    //
    public function getFile($foldername, $filename){
        $name = $filename;
        if ($foldername == 'attachments'){
            $name = NewsAttachment::where('path',$foldername.'/'.$filename)->first()->filename;
        }
        
        $path = storage_path('app/'.$foldername.'/'.$filename);

        if (!File::exists($path)) {
            abort(404);
        }

        $file = File::get($path);
        $type = File::mimeType($path);

        $response = Response::make($file, 200);


        $response->header("Content-Type", $type)->header('Content-disposition','attachment; filename="'.$name.'"');

        return $response;
    }
}
