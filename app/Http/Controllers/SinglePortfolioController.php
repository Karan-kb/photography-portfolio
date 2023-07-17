<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Portfolio;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SinglePortfolioController extends Controller
{
    public function view_singlePortfolio($id){
        if (!Portfolio::where('id', $id)->exists()) {
            throw new Exception('Record not found');
        }

        $portfolio = Portfolio::get($id);
        return view('home.portfolio.portfolio_single', compact('portfolio'));
    }
}
