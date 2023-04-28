<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class LanguageController extends Controller
{
    public function english()
    {
        session()->get('language');
        session()->forget('language');
        Session::put('language' , 'english');
        return redirect()->back();

    } //end method

    public function arabic()
    {
        session()->get('language');
        session()->forget('language');
        Session::put('language' , 'arabic');
        return redirect()->back();

    } //end method
}
