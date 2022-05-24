<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use ZipArchive;
use Illuminate\Support\Facades\DB;

use App\Models\Sessions;

class ZipController extends Controller
{
    public function download_all(Request $req){   

        $id = $req->input('id');

        $sessions = DB::table('sessions')->where('id', $id)->get();
        $photos = DB::table('session_files')->where('session_id', $id)->get();

        $zip = new ZipArchive;
   
        $path = 'images/photoshoots/'.$id;

        $fileName = 'Sesja-numer-'.$id.'.zip';
   
        if ($zip->open($fileName, ZipArchive::CREATE) === TRUE)
        {
            $numerek = 1;
            foreach ($photos as $photo) {
                echo $photo->file;
                $addFile = $path.'/'.$photo->file;
                $fileNewName = 'Zdjecie-'.$numerek.'.jpg';
                $zip->addFile($addFile, $fileNewName);
                $numerek++;
            }
            ob_end_clean();
            $zip->close();            
        }

        $session = Sessions::where('id', $id)->first();
        $session->downloads = $session->downloads+1;
        $session->save();
        
        return response()->download($fileName)->deleteFileAfterSend();
        return redirect()->back();

    }
}
