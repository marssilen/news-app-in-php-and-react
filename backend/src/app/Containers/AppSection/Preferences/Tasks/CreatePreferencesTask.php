<?php

namespace App\Containers\AppSection\Preferences\Tasks;

use App\Containers\AppSection\Preferences\Data\Repositories\PreferencesRepository;
use App\Containers\AppSection\Preferences\Events\PreferencesCreatedEvent;
use App\Containers\AppSection\Preferences\Models\Preferences;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Exception;

class CreatePreferencesTask extends ParentTask
{
    public function __construct(
        protected PreferencesRepository $repository
    ) {
    }

    /**
     * @throws CreateResourceFailedException
     */
    public function run(array $data): Preferences
    {
        try {
            return $this->repository->create($data);
        } catch (Exception) {
            throw new CreateResourceFailedException();
        }
    }
}
