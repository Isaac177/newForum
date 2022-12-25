<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Resources\Json\JsonResource;

class ThreadResource extends JsonResource
{
    public static $wrap = 'threads';

    public function toArray($request)
    {
        return [
            'type' => 'threads',
            'id' => $this->id,
            'attributes' => [
                'title' => $this->title,
                'slug' => $this->slug,
                'body' => $this->body,
                'created_at' => $this->created_at,
            ],

            'relationships' => [
                'author' =>  new AuthorResource($this->author),
            ],
            'links' => [
                'self' => route('threads.show', ['thread' => $this->id]),
                'related' => route('threads.show', ['thread' => $this->slug]),
            ],
        ];
    }

    public function with($request)
    {
        return [
            'status' => 'success',
        ];
    }

    public function withResponse($request, $response)
    {
        $response->header('Accept', 'application/json');
    }
}

