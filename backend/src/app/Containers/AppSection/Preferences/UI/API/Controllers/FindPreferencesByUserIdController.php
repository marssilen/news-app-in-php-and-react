<?php

namespace App\Containers\AppSection\Preferences\UI\API\Controllers;

use Apiato\Core\Exceptions\InvalidTransformerException;
use App\Containers\AppSection\Preferences\Actions\FindPreferencesByUserIdAction;
use App\Containers\AppSection\Preferences\UI\API\Requests\FindPreferencesByUserIdRequest;
use App\Containers\AppSection\Preferences\UI\API\Transformers\PreferencesTransformer;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Controllers\ApiController;

class FindPreferencesByUserIdController extends ApiController
{
    /**
     * @throws InvalidTransformerException|NotFoundException
     */
    public function findPreferencesByUserId(FindPreferencesByUserIdRequest $request): array
    {
        $preferences = app(FindPreferencesByUserIdAction::class)->run($request);

        return $this->transform($preferences, PreferencesTransformer::class);
    }
}
