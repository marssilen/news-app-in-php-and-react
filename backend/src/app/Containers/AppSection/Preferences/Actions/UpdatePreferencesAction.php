<?php

namespace App\Containers\AppSection\Preferences\Actions;

use Apiato\Core\Exceptions\IncorrectIdException;
use App\Containers\AppSection\Preferences\Models\Preferences;
use App\Containers\AppSection\Preferences\Tasks\FindPreferencesByUserIdTask;
use App\Containers\AppSection\Preferences\Tasks\UpdatePreferencesTask;
use App\Containers\AppSection\Preferences\UI\API\Requests\UpdatePreferencesRequest;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Actions\Action as ParentAction;

class UpdatePreferencesAction extends ParentAction
{
    /**
     * @param UpdatePreferencesRequest $request
     * @return Preferences
     * @throws UpdateResourceFailedException
     * @throws IncorrectIdException
     * @throws NotFoundException
     */
    public function run(UpdatePreferencesRequest $request): Preferences
    {
        $data = $request->sanitizeInput([
            'sources',
            'categories',
            'authors'
        ]);

        $user = $request->user();

        $preference = app(FindPreferencesByUserIdTask::class)->run($user->id);

        return app(UpdatePreferencesTask::class)->run($data, $preference->id);
    }
}
