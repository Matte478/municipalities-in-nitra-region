<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class CityController extends Controller
{
    Public function index(): View
    {
        return view('index');
    }
}
