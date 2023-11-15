<?php

namespace App\Http\Controllers;

use App\Http\Resources\MovieResource;
use Illuminate\Http\Request;
use App\Models\Movie;
use App\Http\Resources\MovieCollection;
class MovieController extends Controller
{
    public function index(Request $request)
    {
        $perPage = $request->input('per_page', 10);
        $movies = Movie::paginate($perPage);

        return new MovieCollection($movies);
    }
    public function getTopMovies()
    {
        $topMovies = Movie::orderByDesc('vote_average')->take(5)->get();

        return MovieResource::collection($topMovies);
    }
}
