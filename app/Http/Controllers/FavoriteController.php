<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Favorite;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller
{
    public function addMovie(Request $request, $movieId)
    {
        $user = Auth::user();

        Favorite::updateOrCreate(
            ['user_id' => $user->id, 'movie_id' => $movieId],
            ['series_id' => null]
        );

        return response()->json(['message' => 'Movie added to favorites']);
    }

    public function addSeries(Request $request, $seriesId)
    {
        $user = Auth::user();

        Favorite::updateOrCreate(
            ['user_id' => $user->id, 'series_id' => $seriesId],
            ['movie_id' => null]
        );

        return response()->json(['message' => 'Series added to favorites']);
    }

    public function removeMovie(Request $request, $movieId)
    {
        $user = Auth::user();

        Favorite::where(['user_id' => $user->id, 'movie_id' => $movieId])->delete();

        return response()->json(['message' => 'Movie removed from favorites']);
    }

    public function removeSeries(Request $request, $seriesId)
    {
        $user = Auth::user();

        Favorite::where(['user_id' => $user->id, 'series_id' => $seriesId])->delete();

        return response()->json(['message' => 'Series removed from favorites']);
    }

    public function getFavorites(Request $request)
    {
        $user = Auth::user();

        $favorites = Favorite::where('user_id', $user->id)
            ->with(['movie', 'serie'])
            ->get();

        return response()->json(['favorites' => $favorites]);
    }
}
