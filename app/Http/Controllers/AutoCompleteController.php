<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class AutoCompleteController extends Controller
{
    function index(){
        return view('frontend.autocomplete');
    }
   
    function fetch(Request $request)
    {
     if($request->get('query'))
     {
      $query = $request->get('query');
      $data = DB::table('_tour_packages')
        ->where('title', 'LIKE', "%{$query}%")
        ->get();
      $output = '<ul class="dropdown-menu"  style="display:block; position:relative ;width: 75%; left:92px;">';
      foreach($data as $row)
      {
       $output .= '
       <li class="list-group-item list-group-item-primary" style="font-size: 27px;border-bottom: 1px solid #000;"><a href="#">'.$row->title.'</a></li>
       ';
      }
      $output .= '</ul>';
      echo $output;
     }
    }

}
