<?php

namespace App\Http\Controllers;

use App\Models\Portfolio;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomePortfolioController extends Controller
{
    public function portfolio_view()
    {
        $portfolios = Portfolio::all(); // Retrieve all portfolio records from the "portfolios" table
        
        return view('home.portfolio.view_portfolio', compact('portfolios'));
    }
    
}
