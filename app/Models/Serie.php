<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Serie extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'first_air_date',
        'overview',
        'poster_path',
        'vote_average',
        'genre_ids',
        'tmdb_id',
    ];
}
