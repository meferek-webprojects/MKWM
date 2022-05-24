<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

use Carbon\Carbon;
use Intervention\Image\Facades\Image;

use App\Models\Sessions;
use App\Models\SessionFiles;

class SessionController extends Controller
{
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
        $session = new Sessions;

        $id = Sessions::orderByDesc('id')->first();
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

                $sid = SessionFiles::orderByDesc('id')->first();
                if(!isset($sid)) $id = 0; else $id = $sid->id;

                $session_file = new SessionFiles;
                $session_file->id = $id+1;
                $session_file->session_id = $session->id;
                if($key == 0) $session_file->favourite = '1';
                $fileName = Str::random(32).'.'.$file->getClientOriginalExtension();
                $path = 'images/photoshoots/'.$session->id;
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
        $session = Sessions::find($id);
        $users = DB::table('users')->get();
        $userInSession = false;

        if( str_contains($session->users_id, Auth::user()->id) )
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
        $session = Sessions::find($id);
        
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
        $session = Sessions::find($id);

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

                $sid = SessionFiles::orderByDesc('id')->first();
                if(!isset($sid)) $id = 0; else $id = $sid->id;

                $session_file = new SessionFiles;
                $session_file->id = $id+1;
                $session_file->session_id = $session->id;
                $fileName = Str::random(32).'.'.$file->getClientOriginalExtension();
                $path = 'images/photoshoots/'.$session->id;
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
        $files = SessionFiles::where('session_id', $id)->get();
        $session = Sessions::where('id', $id)->first();

        foreach($files as $file){

            if(file_exists('images/photoshoots/'.$session->id.'/'.$file->file)){
                $deletedFiles = unlink('images/photoshoots/'.$session->id.'/'.$file->file);
            }
            $deletedRows = SessionFiles::where('id', $file->id)->delete();
            
        }
        
        $deletedRows = Sessions::where('id', $id)->delete();

        if(is_dir('images/photoshoots/'.$session->id)) rmdir('images/photoshoots/'.$session->id);

        return redirect('/session')->with('warning', 'Pomyślnie usunięto sesję!');
    }
}
