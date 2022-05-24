<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Sessions;
use App\Models\SessionFiles;

class SessionFilesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $session_file = SessionFiles::find($id);

        if($session_file->favourite == 0){
            SessionFiles::where('session_id', $session_file->session_id)->where('favourite', '1')->update(['favourite' => '0']);
            $session_file->favourite = 1;
        }else $session_file->favourite = 0;

        $session_file->save();

        return redirect()->back()->with('warning', 'Pomyślnie zaktualizowano element sesji!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        SessionFiles::find($id)->delete();

        return redirect()->back()->with('warning', 'Pomyślnie usunięto element sesji!');
    }
}
