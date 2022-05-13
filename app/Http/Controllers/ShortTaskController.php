<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use App\Models\User;

class ShortTaskController extends Controller
{
    public function change_theme(Request $request) {

        if(Auth::user()->theme == "dark") $newTheme = "light";
        else $newTheme = "dark";

        $data = Auth::user();

        $user = User::find(Auth::user()->id);
        $user->theme = $newTheme;
        $user->save();
        
        return redirect()->back();

    }
}
