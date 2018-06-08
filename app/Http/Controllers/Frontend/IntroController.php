<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Intro;

class IntroController extends Controller
{
    public function index()
    {
        $intro = Intro::where('status', 1)->first();

        return view('frontend.intro', compact('intro'));
    }
}
