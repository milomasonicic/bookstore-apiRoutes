<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class PublisherCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray(Request $request): array
    {   //transform

        function toArray($request)
        {
            return [
                'data' => $this->collection->transform(function ($publisher) {
                    return [
                        'name' => $publisher->name,
                    ];
                }),
            ];
        }
    }
}
