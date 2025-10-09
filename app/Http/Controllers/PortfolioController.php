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
        $nextproject = DB::table('portfolios')->where('id', '>', $portfolio->id)->first();
        $prevproject = DB::table('portfolios')->where('id', '<', $portfolio->id)->first();

        return view('portfolio.show', compact('portfolio', 'nextproject', 'prevproject'));
    }
}
