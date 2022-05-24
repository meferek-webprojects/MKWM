<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use App\Models\Testimonials;

class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $testimonials = DB::table('testimonials')->get();

        return view('dashboard.testimonial-list')->with('testimonials', $testimonials);
    }

    public function testimonial_aproved(Request $request)
    {
        $testimonial = Testimonials::find($request->id);

        if($testimonial->aproved == true)
            $testimonial->aproved = false;
        else
            $testimonial->aproved = true;

        $testimonial->save();

        return redirect('/testimonial')->with('success', 'Pomyślnie zmieniono status opinię');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.testimonial-add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $counter = Testimonials::where('user_id', Auth::user()->id)->count();
        
        if(strlen($request->testimonial) > 150) {
            return redirect('/testimonial/create')->with('danger', 'Maksymalna ilość znaków to 150!');
        }

        if($counter == 0) {
            $testimonial = new Testimonials;
            $testimonial->user_id = $request->user_id;
            $testimonial->testimonial = substr($request->testimonial, 0, 150); 
        }
        else {
            $testimonial = Testimonials::where('user_id', Auth::user()->id)->first();
            $testimonial->user_id = $request->user_id;
            $testimonial->aproved = false;
            $testimonial->testimonial = substr($request->testimonial, 0, 150); 
        }


        $testimonial->save();

        return redirect('/testimonial/create')->with('success', 'Pomyślnie dodano nową referencję do bazy!');
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Testimonials::find($id)->delete();

        return redirect('/testimonial')->with('warning', 'Pomyślnie usunięto opinie');
    }

}
