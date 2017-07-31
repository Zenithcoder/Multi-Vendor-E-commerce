<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class BackendController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware(['auth','admin']);
    }


    public function admin()
    {
        $user = Auth::user();
        return view('backend.dashboard', compact('user'));
    }
    public function categories()
    {
        return view('backend.categories');
    }
    public function products()
    {
        return view('backend.products');
    }
    public function brands()
    {
        return view('backend.brands');
    }
    public function order()
    {
        return view('backend.order');
    }
    public function getLogout()
    {
        Auth::logout();
        Session::flush();
        return redirect()->route('frontend.signin');
    }
}
