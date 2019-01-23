<?php

namespace LaraDex\Http\Controllers;

use Storage;
use Illuminate\Http\Request;

class FileSystemController extends Controller
{
    public function Local(Request $request) {
        $diskLocal = Storage::disk('local');

        if (!$diskLocal->exists('example.txt')) {
            $diskLocal->put("example.txt", "Esto es un ejemplo nuevo");
        } else {
            return $diskLocal->get('example.txt');
        }
    }

    public function GoogleCloudStorage() {
        $diskGCS = Storage::disk('gcs');

        $diskGCS->put('example.txt', 'hello from local');


        /* $diskGCS = Storage::disk('gcs');
        $folder = "images/";
        $file_name = "ash.png";
        $file = $folder.$file_name;
        
        if ($diskGCS->exists($file)) {
            $url_file = $diskGCS->url($file);
            
            return view('trainers.download', compact('url_file'));
        } */
    }
}
