<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GeneralController extends Controller
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
    
      public function index()
      {
        return view('index');
      }
      public function create()
      {
        return view('create-fantasy');
      }
      public function myfantasy()
      {
        return view('myfantasy');
      }
      public function search()
      {
        return view('search');
      }
      public function fantasy()
      {
        return view('fantasy');
      }
      

}
