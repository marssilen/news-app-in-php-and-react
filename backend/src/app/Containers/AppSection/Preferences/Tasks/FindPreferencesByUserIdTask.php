<?php

namespace App\Containers\AppSection\Preferences\Tasks;

use App\Containers\AppSection\Preferences\Data\Repositories\PreferencesRepository;
use App\Containers\AppSection\Preferences\Models\Preferences;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Exception;

class FindPreferencesByUserIdTask extends ParentTask
{
    public function __construct(
        protected PreferencesRepository $repository
    ) {
    }

    /**
     * @throws NotFoundException
     */
    public function run($user_id): Preferences
    {
        try {
            return $this->repository->findByField('user_id', $user_id)->first();
        } catch (Exception) {
            throw new NotFoundException();
        }
    }
}
