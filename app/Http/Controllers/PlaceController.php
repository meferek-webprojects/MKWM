<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use App\Models\Place;

class PlaceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $places = DB::table('places')->get();

        return view('dashboard.place-list')->with('places', $places);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.place-add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $place = new Place;
        $place->name = $request->name;
        $link = substr(explode(" ", $request->link)[1], 5);
        $place->link = substr($link, 0, -1);

        $place->save();

        return redirect('/place')->with('success', 'Pomyślnie dodano nowe miejsce');
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
        $place = Place::find($id);

        return view('dashboard.place-add')->with('place', $place);
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
        $place = Place::find($id);
        $place->name = $request->name;
        if(strpos($request->link, " ")){ 
            $link = substr(explode(" ", $request->link)[1], 5);
            $place->link = substr($link, 0, -1);

        }
        else { 
            $place->link =  $request->link;
         }

        $place->save();

        return redirect('/place')->with('success', 'Pomyślnie zaktualizowano miejsce');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Place::find($id)->delete();

        return redirect('/place')->with('warning', 'Pomyślnie usunięto miejsce');
    }
}
