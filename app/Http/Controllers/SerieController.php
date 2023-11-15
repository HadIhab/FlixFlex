<?php

namespace App\Http\Controllers;

use App\Http\Resources\SerieCollection;
use App\Http\Resources\SerieResource;
use App\Models\Serie;
use Illuminate\Http\Request;

class SerieController extends Controller
{
    public function index(Request $request)
    {
        $perPage = $request->input('per_page', 10);
        $series = Serie::paginate($perPage);

        return new SerieCollection($series);
    }

    public function getTopSeries()
    {
        $topSeries = Serie::orderByDesc('vote_average')->take(5)->get();

        return SerieResource::collection($topSeries);
    }
}
