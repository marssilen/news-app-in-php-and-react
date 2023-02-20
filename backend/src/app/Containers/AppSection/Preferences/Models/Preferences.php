<?php

namespace App\Containers\AppSection\Preferences\Models;

use App\Ship\Parents\Models\Model as ParentModel;

class Preferences extends ParentModel
{
    protected $fillable = [
        'user_id',
        'sources',
        'categories',
        'authors'
    ];

    protected $hidden = [

    ];

    protected $casts = [

    ];

    /**
     * A resource key to be used in the serialized responses.
     */
    protected string $resourceKey = 'Preferences';
}
