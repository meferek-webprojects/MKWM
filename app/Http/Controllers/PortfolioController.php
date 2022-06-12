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

use App\Models\Portfolio;
use App\Models\PortfolioFile;

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
        $portfolios = DB::table('portfolios')->where('kind', 'photo')->get();  
        
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

        if($request->file('files')){
            
            $files = $request->file('files');

            foreach($files as $file){

                $portfolio = new Portfolio;
        
                $id = Portfolio::orderByDesc('id')->first();
                if(!isset($id)) $id = 0; else $id = $id->id;
                $portfolio->id = $id+1;
        
                $portfolio->type = $request->type;
                $portfolio->kind = $request->kind;
                if(isset($request->link )) $portfolio->link = $request->link;

                $webpName = Str::random(32);
                $webpPath = 'images/portfolios/';

                if (!file_exists($webpPath)) {
                    mkdir($webpPath, 0775, true);
                    chmod($webpPath, 02775);
                }
                
                $image = Image::make($file)->encode('webp', 90)->save($webpPath.$webpName.'.webp');

                // $fileName = Str::random(32).'.'.$file->getClientOriginalExtension();
                // $path = 'images/portfolios/';
                // $file->move($path, $fileName);

                $portfolio->file = $webpName.'.webp';
                $portfolio->save();

            }

        }
        else {

            $portfolio = new Portfolio;
        
            $id = Portfolio::orderByDesc('id')->first();
            if(!isset($id)) $id = 0; else $id = $id->id;
            $portfolio->id = $id+1;
    
            $portfolio->type = $request->type;
            $portfolio->kind = $request->kind;
            $portfolio->file = 'NONE';
            if(isset($request->link)) $portfolio->link = $request->link;

            $portfolio->save();

        }
        

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

        $portfolio = Portfolio::find($id);

        if(isset($request->hero)){
            $oldhero = Portfolio::where('hero', true)->orderBy('updated_at', 'asc')->get();

            if($oldhero->count() >= 5) {
                $oldhero = $oldhero->first();
                $oldhero->hero = false;
                $oldhero->save();
            }

            $portfolio->hero = !$portfolio->hero;
        }
        if(isset($request->type_header)){
            $oldheader = Portfolio::where('type_header', true)->where('type', $portfolio->type)->first();
            if(isset($oldheader)) {
                $oldheader->type_header = false;
                $oldheader->save();
            }
            
            $portfolio->type_header = !$portfolio->type_header;
        }

        $portfolio->save();

        return redirect('/portfolio-photo')->with('success', 'Pomyślnie zaktualizowano portfolio');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $file = Portfolio::find($id);

        if(file_exists('images/portfolios/'.$file->file)){
            unlink('images/portfolios/'.$file->file);
        }

        $file->delete();

        return redirect()->back()->with('warning', 'Pomyślnie usunięto element sesji!');
    }

}
