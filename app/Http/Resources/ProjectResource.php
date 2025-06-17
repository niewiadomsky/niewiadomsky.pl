<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProjectResource extends JsonResource
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
            'description' => $this->description,
            'live_url' => $this->live_url,
            'iframe_url' => $this->iframe_url,
            'github_url' => $this->github_url,
            'created_year' => $this->created_year,
            'images' => $this->getMedia('projects')->map(fn ($media) => $media->getUrl()),
            'skills' => $this->whenLoaded('skills', function () {
                return SkillResource::collection($this->skills);
            }),
        ];
    }
}
