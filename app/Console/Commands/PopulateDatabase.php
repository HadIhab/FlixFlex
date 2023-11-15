<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use App\Models\Movie;
use App\Models\Serie;

class PopulateDatabase extends Command
{
    protected $signature = 'populate:database';
    protected $description = 'Fetch data from TMDB API and populate the database.';

    public function handle()
    {
        $apiKey = '2f6d0f54f883f96d76b9fb0f3007081b';
        $baseUrl = 'https://api.themoviedb.org/3/';

        $moviesResponse = Http::get($baseUrl . 'movie/popular', [
            'api_key' => $apiKey,
        ])->json();

        $seriesResponse = Http::get($baseUrl . 'tv/popular', [
            'api_key' => $apiKey,
        ])->json();

        $this->insertDataIntoMoviesTable(array_slice($moviesResponse['results'], 0, 500));
        $this->insertDataIntoSeriesTable(array_slice($seriesResponse['results'], 0, 500));

        $this->info('Data populated successfully!');
    }

    private function insertDataIntoMoviesTable($data)
    {
        foreach ($data as $item) {
            $record = [
                'title' => $item['title'],
                'release_date' => $item['release_date'],
                'overview' => $item['overview'],
                'poster_path' => $item['poster_path'],
                'vote_average' => $item['vote_average'],
                'genre_ids' => implode(',', $item['genre_ids']),
                'tmdb_id' => $item['id'],
            ];

            Movie::create($record);
        }
    }
    private function insertDataIntoSeriesTable($data)
    {
        foreach ($data as $item) {
            $record = [
                'name' => $item['name'],
                'first_air_date' => $item['first_air_date'],
                'overview' => $item['overview'],
                'poster_path' => $item['poster_path'],
                'vote_average' => $item['vote_average'],
                'genre_ids' => implode(',', $item['genre_ids']),
                'tmdb_id' => $item['id'],
                'created_at' => now(),
                'updated_at' => now(),
            ];

            Serie::create($record);
        }
    }
}


