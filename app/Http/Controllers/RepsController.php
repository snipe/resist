<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rep;

class RepsController extends Controller
{
    public function index() {

        $reps = Rep::with('committees')->get();
        return view('welcome')->with('reps',$reps);
    }
}
