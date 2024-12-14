<?php

namespace App\Http\Controllers;

use App\Models\City;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class CityController extends Controller
{
    public function index(): View
    {
        return view('index');
    }

    public function detail(City $city): View
    {
        return view('detail', [
            'city' => $city,
        ]);
    }
}
