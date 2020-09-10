<?php

namespace App\Http\Resources;

// use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class UserResource extends ResourceCollection
{
    public function toArray($request)
    {
        return [
            'message' => 'Get List User',
            'data' => $this->collection
        ];
    }
}
