<?php

namespace App\Containers\AppSection\Preferences\UI\API\Transformers;

use App\Containers\AppSection\Preferences\Models\Preferences;
use App\Ship\Parents\Transformers\Transformer as ParentTransformer;

class PreferencesTransformer extends ParentTransformer
{
    protected array $defaultIncludes = [

    ];

    protected array $availableIncludes = [

    ];

    public function transform(Preferences $preferences): array
    {
        $response = [
            'object' => $preferences->getResourceKey(),
            'id' => $preferences->getHashedKey(),
            'sources' => is_array($preferences->sources)?$preferences->sources: json_decode($preferences->sources),
            'authors' => is_array($preferences->authors)?$preferences->authors:json_decode($preferences->authors),
            'categories' => is_array($preferences->categories)?$preferences->categories:json_decode($preferences->categories),
        ];

        return $this->ifAdmin([
            'real_id' => $preferences->id,
            'created_at' => $preferences->created_at,
            'updated_at' => $preferences->updated_at,
            'readable_created_at' => $preferences->created_at->diffForHumans(),
            'readable_updated_at' => $preferences->updated_at->diffForHumans(),
            // 'deleted_at' => $preferences->deleted_at,
        ], $response);
    }
}
