<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Str;

class ExperienceResource extends JsonResource
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
            'position' => $this->position,
            'company' => $this->company,
            'location' => $this->location,
            'started_at' => $this->started_at->format('Y-m-d'),
            'ended_at' => $this->ended_at?->format('Y-m-d'),
            'entries' => ExperienceEntryResource::collection($this->whenLoaded('entries')),
        ];
    }
}
