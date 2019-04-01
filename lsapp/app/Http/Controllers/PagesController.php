<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    // public so we can access it outside of class
    public function index() {
        return view('pages.index');
    }
}
