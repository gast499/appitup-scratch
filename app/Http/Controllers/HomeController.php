<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $tmp = 'public/avatars/'.$user->id.'/';
        if(!in_array($user->id, Storage::directories('public/avatars'))){
            //mkdir('storage/app/public/avatars/'.$user->id.'/');
            Storage::makeDirectory($tmp);
            Storage::copy('public/avatars/default.jpg', $tmp.'default.jpg');
        }
        return view('home');
    }
}
