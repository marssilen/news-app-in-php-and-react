<?php

namespace App\Containers\AppSection\Preferences\Data\Repositories;

use App\Ship\Parents\Repositories\Repository as ParentRepository;

class PreferencesRepository extends ParentRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => '=',
        // ...
    ];
}
