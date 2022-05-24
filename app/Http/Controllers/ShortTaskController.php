<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use App\Models\User;
use App\Models\Sessions;
use App\Mail\ContactMail;

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

        Mail::to('mkwm.studios@outlook.com')->queue(new ContactMail($request->title, $request->message, $request->author));

        return redirect()->back()->with('success', 'Twoje złoszenie zostało wysłane!');
    }

    public function faq(Request $request){
        return view('dashboard.faq');
    }

    public function change_privacy(Request $request){
        $session = Sessions::find($request->id);
        if($session->type == 'private')
           $session->type = 'public';
        else
            $session->type = 'private';
        $session->save();

        return redirect()->back()->with('success', 'Pomyślnie zmieniono prywatność sesji');
    }
}
