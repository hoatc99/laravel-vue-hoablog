<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Nette\Utils\DateTime;

class PostResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'category' => $this->category->name,
            'user' => $this->user->fullname,
            'title' => $this->title,
            'slug' => $this->slug,
            'image_url' => $this->image_url,
            'summary' => $this->summary,
            'content' => $this->content,
            'views' => $this->views,
            'status' => $this->is_active,
            'comments' => CommentResource::collection($this->comments),
            'likes' => $this->likes->count(),
            'tags' => $this->tags,
            'created_at' => (new DateTime($this->created_at))->format('Y-m-d H:i:s'),
            'updated_at' => (new DateTime($this->updated_at))->format('Y-m-d H:i:s'),
        ];
    }
}
