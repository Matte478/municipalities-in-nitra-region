<?php

namespace App\Http\Controllers;

use App\Http\Requests\SuggestionRequest;
use App\Models\City;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;

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

    public function suggestion(SuggestionRequest $request): JsonResponse
    {
        $data = $request->validated();

        $results = City::where('name', 'like', "%{$data['query']}%")->get(['id', 'name']);

        return response()->json($results);
    }
}
