<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\Serie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class TrailerController extends Controller
{
    public function watchTrailer(Request $request, $type, $id)
    {
        try {
            $model = null;
            $title = null;

            if ($type === 'movie') {
                $model = Movie::findOrFail($id);
                $title = $model->title;
            } elseif ($type === 'serie') {
                $model = Serie::findOrFail($id);
                $title = $model->name;
            } else {
                return response()->json(['error' => 'Invalid type'], 400);
            }

            // Make a request to the YouTube API
            $response = Http::get('https://www.googleapis.com/youtube/v3/search', [
                'q' => "$title trailer",
                'part' => 'snippet',
                'maxResults' => 1,
                'type' => 'video',
                'key' => 'AIzaSyB57Qnm3z-P7R3wwgA5K8VymbZpp3gVedI',
            ]);

            $data = $response->json();

            // Assuming the first result is the trailer
            $videoId = $data['items'][0]['id']['videoId'];
            $trailerUrl = "https://www.youtube.com/watch?v={$videoId}";

            return response()->json(['trailer_url' => $trailerUrl]);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
