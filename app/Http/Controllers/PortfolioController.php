<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PortfolioController extends Controller
{
    function index()
    {
        $portfolio = DB::table('portfolios')->get();

        // dd($portfolio);
        return view('portfolio.index', compact('portfolio'));
    }

    function show($slug)
    {
        $portfolio = DB::table('portfolios')->where('slug', $slug)->first();
        return view('portfolio.show', compact('portfolio'));
    }
}
