<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use App\Http\Resources\AuthorResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class AuthorCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray(Request $request): array
    {
        function toArray($request)
        {
            return [
                'data' => $this->collection->transform(function ($author) {
                    return [
                        'name' => $author->name,
                    ];
                }),
            ];
        }
    
        
    }
}
