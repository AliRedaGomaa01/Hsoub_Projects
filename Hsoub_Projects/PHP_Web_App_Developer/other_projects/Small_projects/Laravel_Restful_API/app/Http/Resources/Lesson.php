<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class Lesson extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        // return parent::toArray($request);
        return [
            'Author' => $this->user->name,
            'Title' => $this->title,
            'Content' => $this->body,
            // 'Tags' => TagResource::collection($this->tags),
        ];
    }
}
