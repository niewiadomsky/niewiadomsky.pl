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
            'url' => $this->url,
            'github_url' => $this->github_url,
            'images' => $this->getFirstMediaUrl('projects'),
            'skills' => $this->whenLoaded('skills', function () {
                return SkillResource::collection($this->skills);
            }),
        ];
    }
}
