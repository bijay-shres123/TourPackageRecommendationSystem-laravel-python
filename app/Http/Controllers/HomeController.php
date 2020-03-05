<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
       // $title="Admin || Dashboard";
       if($request->user()->role=='admin'){
           return redirect()->route('admin');
       }else if($request->user()->role=='vendor'){
        return redirect()->route('vendor');
       }elseif($request->user()->role=='customer'){
        return redirect()->route('customer');
       }
   
    }
}