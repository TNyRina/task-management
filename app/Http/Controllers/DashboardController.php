<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class DashboardController extends Controller
{
     public function index(): View | RedirectResponse{
        return view('dashboard.index',[
            'user' => Auth::user()  
        ]);
    }
}
