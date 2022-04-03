<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ArticleResource extends JsonResource
{

    /**
     * The "data" wrapper that should be applied.
     *
     * @var string
     */
    public static $wrap = 'Article';

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
            'title' => $this->title,
            'Article cover' => $this->thumbnail,
            'Article full text' => $this->article,
            'description' => substr($this->title, 0, 100),
            'comment' => CommentResource::collection($this->whenLoaded('comments')),
            'Likes' => LikeResource::collection($this->whenLoaded('likes')),
            'Views' => ViewResource::collection($this->whenLoaded('views')),
        ];
    }
}