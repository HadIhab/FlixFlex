<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\Serie;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $query = $request->input('query');

        $movies = Movie::where('title', 'like', "%$query%")->get();
        $series = Serie::where('name', 'like', "%$query%")->get();

        return response()->json(['movies' => $movies, 'series' => $series]);
    }
}
