<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\{Incoming, Outgoing};

class FileController extends Controller
{

    public function getIncomingFile($id){
        $file = Incoming::findOrFail($id);
        if(empty($file)){
            abort(404, 'Cannot find file.');    
        }
        $header = [
            'Content-Type: application/pdf'
        ];
        return response()->file(substr($file->files, 1), $header);
    }
    public function getOutgoingFile($id){
        $file = Outgoing::findOrFail($id);
        if(empty($file)){
            abort(404, 'Cannot find file.');    
        }
        $header = [
            'Content-Type: application/pdf'
        ];
        return response()->file(substr($file->files, 1), $header);
    }
}
