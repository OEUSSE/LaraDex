<?php

namespace LaraDex\Http\Controllers;

use Storage;
use Illuminate\Http\Request;

class FileSystemController extends Controller
{
    public function Local(Request $request) {
        $diskLocal = Storage::disk('local');

        if (!$diskLocal->exists('example.txt')) {
            $diskLocal->put("example.txt", "Esto es un ejemplo");
        } else {
            return $diskLocal->get('example.txt');
        }
    }

    public function GoogleCloudStorage() {
        $diskGCS = Storage::disk('gcs');
        
        if ($diskGCS->exists('images/ash.png')) {
            $url_file = $diskGCS->url('images/ash.png');
            
            
            return view('trainers.download', compact('url_file'));
        }
    }
}
