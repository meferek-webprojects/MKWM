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

use App\Models\Portfolios;
use App\Models\PortfolioFiles;

class PortfolioController extends Controller
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

    public function photo_index()
    {
        $portfolios = DB::table('portfolios')->join('portfolio_files', 'portfolios.id', '=', 'portfolio_files.portfolio_id')->select('portfolio_files.*', 'portfolios.type')->where('kind', 'photo')->get();  
        
        return view('dashboard.portfolio-photo')->with('portfolios', $portfolios);
    }

    public function video_index()
    {
        $portfolios = DB::table('portfolios')->where('kind', 'video')->get();  
        
        return view('dashboard.portfolio-video')->with('portfolios', $portfolios);
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

        $portfolio = new Portfolios;
        
        $id = Portfolios::orderByDesc('id')->first();
        if(!isset($id)) $id = 0; else $id = $id->id;
        $portfolio->id = $id+1;

        $portfolio->type = $request->type;
        $portfolio->kind = $request->kind;
        if(isset($request->link )) $portfolio->link = $request->link;

        if($request->file('files')){

            $files = $request->file('files');

            foreach($files as $file){

                $sid = PortfolioFiles::orderByDesc('id')->first();
                if(!isset($sid)) $id = 0; else $id = $sid->id;

                $portfolio_file = new PortfolioFiles;
                $portfolio_file->id = $id+1;
                $portfolio_file->portfolio_id = $portfolio->id;
                $fileName = Str::random(32).'.'.$file->getClientOriginalExtension();
                $path = 'images/portfolios/';
                $file->move($path, $fileName);

                $portfolio_file->file = $fileName;
                $portfolio_file->save();

            }

        } 
        
        $portfolio->save();

        if($request->file('files')) return redirect('/portfolio-photo')->with('sucess', 'Pomyślnie dodano element portfolio');
        else return redirect('/portfolio-video')->with('sucess', 'Pomyślnie dodano element portfolio');
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
    public function destroy(Request $request, $id)
    {
        //
    }

    public function usun(Request $request) {
        if(!isset($request->isLink)) {
            $checkID = PortfolioFiles::find($request->id)->portfolio_id;
            PortfolioFiles::find($request->id)->delete();

            $checkFiles = PortfolioFiles::where('portfolio_id', $checkID)->count();
            if($checkFiles == 0) Portfolios::find($checkID)->delete();
        }
        else Portfolios::find($request->id)->delete();

        return redirect('/portfolio-photo')->with('warning', 'Pomyślnie usunięto element portfolio');
    }

    
}
