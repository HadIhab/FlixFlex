<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SerieResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'first_air_date' => $this->first_air_date,
            'overview' => $this->overview,
            'poster_path' => $this->poster_path,
            'vote_average' => $this->vote_average,
            'genre_ids' => explode(',', $this->genre_ids),
            'tmdb_id' => $this->tmdb_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
        //return parent::toArray($request);
    }
}
