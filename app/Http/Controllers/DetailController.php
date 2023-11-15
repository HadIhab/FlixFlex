<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\Serie;
use Illuminate\Http\Request;

class DetailController extends Controller
{
    public function showMovie($id)
    {
        $movie = Movie::findOrFail($id);

        return response()->json(['movie' => $movie]);
    }

    public function showSeries($id)
    {
        $series = Serie::findOrFail($id);

        return response()->json(['series' => $series]);
    }
}
