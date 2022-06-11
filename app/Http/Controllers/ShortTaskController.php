<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use App\Models\User;
use App\Models\Session;
use App\Models\SessionFile;

use App\Mail\ContactMail;
use App\Mail\NewSession;



class ShortTaskController extends Controller
{
    public function change_theme(Request $request) {

        if(Auth::user()->theme == "dark") $newTheme = "light";
        else $newTheme = "dark";

        $data = Auth::user();

        $user = User::find(Auth::user()->id);
        $user->theme = $newTheme;
        $user->save();
        
        return redirect()->back()->with('sucess', 'Pomyślnie zmieniono motyw');

    }

    public function send_mail(Request $request){

        Mail::to('kontakt@mkwmstudios.pl')->queue(new ContactMail($request->title, $request->message, $request->author));

        return redirect()->back()->with('success', 'Twoje złoszenie zostało wysłane!');
    }

    public function faq(Request $request){
        return view('dashboard.faq');
    }

    public function change_privacy(Request $request){
        $session = Session::find($request->id);
        if($session->type == 'private')
           $session->type = 'public';
        else
            $session->type = 'private';
        $session->save();

        return redirect()->back()->with('success', 'Pomyślnie zmieniono prywatność sesji');
    }

    public function user_lock(Request $request){

        $user = User::find($request->id);
        if( $user->role == 1)
            $user->role = 0;
        else if($user->role == 10)
            return redirect()->back()->with('danger', 'Nie możesz zablokować administratora!');
        else 
            $user->role = 1;
        
        $user->save();
        
        return redirect()->back()->with('success', 'Zmieniono blokadę użytkownika');

    }

    public function photoshoot(Request $request){

        $session = Session::find($request->id)->id;

        if(isset($session)){

            $thisSesssion = Session::find($request->id)->type;

            if($thisSesssion == 'public')
                return view('main.photoshoot')->with(compact('session'));

        }

        return abort('404');
    }

    public function send_photoshoot(Request $request){

        Mail::to($request->input('email'))->send(new NewSession());
        return redirect()->back();

    }

    public function photo_lock(Request $request){

        $photo = SessionFile::find($request->id);

        if($photo->locked == true)
           $photo->locked = false;
        else
            $photo->locked = true;

        $photo->save();

        return redirect()->back()->with('success', 'Pomyślnie zmieniono prywatność sesji');

    }
}
