<?php

namespace App\Http\Controllers;

use Illuminate\Routing\controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function index()
    {
        return view('dashboard');
    }
}
