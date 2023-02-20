<?php

namespace App\Containers\AppSection\Preferences\UI\API\Controllers;

use Apiato\Core\Exceptions\IncorrectIdException;
use Apiato\Core\Exceptions\InvalidTransformerException;
use App\Containers\AppSection\Preferences\Actions\UpdatePreferencesAction;
use App\Containers\AppSection\Preferences\UI\API\Requests\UpdatePreferencesRequest;
use App\Containers\AppSection\Preferences\UI\API\Transformers\PreferencesTransformer;
use App\Containers\AppSection\User\Models\User;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Controllers\ApiController;

class UpdatePreferencesController extends ApiController
{
    /**
     * @param UpdatePreferencesRequest $request
     * @return array
     * @throws InvalidTransformerException
     * @throws UpdateResourceFailedException
     * @throws IncorrectIdException
     * @throws NotFoundException
     */
    public function updatePreferences(UpdatePreferencesRequest $request): array
    {
        $preferences = app(UpdatePreferencesAction::class)->run($request);
        return $this->transform($preferences, PreferencesTransformer::class);
    }
}
