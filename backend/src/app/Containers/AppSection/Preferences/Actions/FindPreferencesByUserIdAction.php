<?php

namespace App\Containers\AppSection\Preferences\Actions;

use App\Containers\AppSection\Preferences\Models\Preferences;
use App\Containers\AppSection\Preferences\Tasks\FindPreferencesByUserIdTask;
use App\Containers\AppSection\Preferences\UI\API\Requests\FindPreferencesByUserIdRequest;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Actions\Action as ParentAction;

class FindPreferencesByUserIdAction extends ParentAction
{
    /**
     * @param FindPreferencesByUserIdRequest $request
     * @return Preferences
     * @throws NotFoundException
     */
    public function run(FindPreferencesByUserIdRequest $request): Preferences
    {
        $user = $request->user();

        return app(FindPreferencesByUserIdTask::class)->run($user->id);
    }
}
