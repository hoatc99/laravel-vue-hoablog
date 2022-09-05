<?php

namespace App\Http\Resources\Client;

use Illuminate\Http\Resources\Json\JsonResource;
use Nette\Utils\DateTime;

use App\Http\Resources\CommentResource;

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
            'category' => [
                'name' => $this->category->name,
                'slug' => $this->category->slug
            ],
            'author' => $this->user->fullname,
            'title' => $this->title,
            'slug' => $this->slug,
            'image_url' => $this->image_url,
            'summary' => $this->summary,
            'content' => $this->content,
            'views' => $this->views,
            'comments' => [
                'count' => $this->comments->count(),
                'collection' => CommentResource::collection($this->comments)
            ],
            'likes' => $this->likes->count(),
            'tags' => $this->tags,
            'created_at' => (new DateTime($this->created_at))->format('Y-m-d H:i:s'),
        ];
    }
}
