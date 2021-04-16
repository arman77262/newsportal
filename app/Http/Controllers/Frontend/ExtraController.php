<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;

class ExtraController extends Controller
{
    public function Hindi(){
        Session()->get('lang');
        Session()->forget('lang');
        Session()->put('lang', 'hindi');
        return redirect()->back();
    }

    public function English(){
        Session()->get('lang');
        Session()->forget('lang');
        Session()->put('lang', 'english');
        return redirect()->back();
    }
}
