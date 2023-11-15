<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $fillable = [
        'title',
        'release_date',
        'overview',
        'poster_path',
        'vote_average',
        'genre_ids',
        'tmdb_id',
    ];
}
