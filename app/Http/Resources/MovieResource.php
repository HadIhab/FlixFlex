<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MovieResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    /*public function toArray(Request $request): array
    {
        return parent::toArray($request);
    }*/
    public function toArray(Request $request)
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'release_date' => $this->release_date,
            'overview' => $this->overview,
            'poster_path' => $this->poster_path,
            'vote_average' => $this->vote_average,
            'genre_ids' => explode(',', $this->genre_ids),
            'tmdb_id' => $this->tmdb_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
