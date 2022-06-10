<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

use Carbon\Carbon;
use Intervention\Image\Facades\Image;

use App\Models\Session;
use App\Models\SessionFile;

class SessionController extends Controller
{

    public function __construct()
    {
        $this->middleware('adminaccess')->except('show');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sessions = DB::table('sessions')->get();

        return view('dashboard.session-list')->with('sessions', $sessions);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $places = DB::table('places')->get();
        $users = DB::table('users')->get();

        return view('dashboard.session-add')->with('places', $places);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $session = new Session;

        $id = Session::orderByDesc('id')->first();
        if(!isset($id)) $id = 0; else $id = $id->id;
        $session->id = $id+1;

        $session->name = $request->name;
        $session->date = $request->date;
        $session->place_id = $request->place;
        $session->type = $request->type;
        $session->kind = $request->kind;
        $session->description = $request->description;
        $session->users_id = json_encode($request->users);
        
        if(isset($request->link)){
            $session->link = $request->link;
        }

        if($request->file('files')){

            $files = $request->file('files');

            foreach($files as $key=>$file){

                $sid = SessionFile::orderByDesc('id')->first();
                if(!isset($sid)) $id = 0; else $id = $sid->id;

                $session_file = new SessionFile;
                $session_file->id = $id+1;
                $session_file->session_id = $session->id;
                if($key == 0){
                    $session_file->favourite = '1';
                    $session_file->centered = '0.5 0.5';
                }
                $fileCode = Str::random(32);
                $fileName = $fileCode.'.'.$file->getClientOriginalExtension();
                $path = 'images/photoshoots/'.$session->id;

                $webpName = $fileCode;
                $webpPath = 'images/webp/'.$session->id.'/';
                if (!file_exists($webpPath)) {
                    mkdir($webpPath, 0775, true);
                    chmod($webpPath, 02775);
                }
                $image = Image::make($file)->encode('webp', 90)->save($webpPath.$webpName.'.webp');
                
                $file->move($path, $fileName);

                $session_file->file = $fileName;
                $session_file->save();

            }

        }   

        $session->save();
                
        return redirect('/session')->with('sucess', 'Pomyślnie dodano sesję');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $session = Session::find($id);
        $users = DB::table('users')->get();
        $counter = DB::table('sessions')->where('id', $id)->where('users_id', 'like', '%"'.Auth::user()->id.'"%')->whereIn('kind', ['photo', 'both'])->count();
        $userInSession = false;

        if( $counter > 0 )
            $userInSession = true;

        if(Auth::user()->hasRole(10) || $userInSession)
            return view('dashboard.session')->with('session', $session);
        else
            return abort(403);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $session = Session::find($id);
        
        return view('dashboard.session-edit')->with('session', $session);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $session = Session::find($id);

        $session->name = $request->name;
        $session->date = $request->date;
        $session->place_id = $request->place;
        $session->type = $request->type;
        $session->kind = $request->kind;
        $session->description = $request->description;
        $session->users_id = json_encode($request->users);
        
        if(isset($request->link)){
            $session->link = $request->link;
        }
        else {
            $session->link = NULL;
        }


        if($request->file('files')){

            $files = $request->file('files');

            foreach($files as $file){

                $sid = SessionFile::orderByDesc('id')->first();
                if(!isset($sid)) $id = 0; else $id = $sid->id;

                $session_file = new SessionFile;
                $session_file->id = $id+1;
                $session_file->session_id = $session->id;
                $fileCode = Str::random(32);
                $fileName = $fileCode.'.'.$file->getClientOriginalExtension();
                $path = 'images/photoshoots/'.$session->id;

                $webpName = $fileCode;
                $webpPath = 'images/webp/'.$session->id.'/';
                if (!file_exists($webpPath)) {
                    mkdir($webpPath, 0775, true);
                    chmod($webpPath, 02775);
                }
                $image = Image::make($file)->encode('webp', 90)->save($webpPath.$webpName.'.webp');
                
                $file->move($path, $fileName);

                $session_file->file = $fileName;
                $session_file->save();
            }

        }   

        $session->save();
                
        return redirect('/session')->with('sucess', 'Pomyślnie zedytowano sesję');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $files = SessionFile::where('session_id', $id)->get();
        $session = Session::where('id', $id)->first();

        foreach($files as $file){

            if(file_exists('images/photoshoots/'.$session->id.'/'.$file->file)){
                unlink('images/photoshoots/'.$session->id.'/'.$file->file);
            }
            if(file_exists('images/webp/'.$session->id.'/'.substr($file->file, 0, -4).'.webp')){
                unlink('images/webp/'.$file->session_id.'/'.substr($file->file, 0, -4).'.webp');
            }
            $deletedRows = SessionFile::where('id', $file->id)->delete();
            
        }
        
        if(is_dir('images/photoshoots/'.$session->id)) rmdir('images/photoshoots/'.$session->id);
        if(is_dir('images/webp/'.$session->id)) rmdir('images/webp/'.$session->id);

        $deletedRows = Session::where('id', $id)->delete();

        return redirect('/session')->with('warning', 'Pomyślnie usunięto sesję!');
    }
}
