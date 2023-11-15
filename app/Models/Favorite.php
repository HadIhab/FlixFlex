<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'movie_id', 'series_id'];

    public function movie()
    {
        return $this->belongsTo(Movie::class);
    }

    public function serie()
    {
        return $this->belongsTo(Serie::class);
    }
}
