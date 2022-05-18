<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use ZipArchive;
use Illuminate\Support\Facades\DB;

class ZipController extends Controller
{
    public function downloadZip(Request $req){   

        $id = $req->input('id');

        $sessions = DB::table('sessions')->where('id', $id)->get();
        $photos = DB::table('sessions_files')->where('session_id', $id)->get();

        $zip = new ZipArchive;
   
        $path = 'images/sessions/'.$id;

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
        
        return response()->download($fileName)->deleteFileAfterSend();
        return redirect('/dashboard/sessions/'.$id);

    }
}
