<?php

namespace App\Containers\AppSection\Preferences\Tasks;

use App\Containers\AppSection\Preferences\Data\Repositories\PreferencesRepository;
use App\Containers\AppSection\Preferences\Events\PreferencesUpdatedEvent;
use App\Containers\AppSection\Preferences\Models\Preferences;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class UpdatePreferencesTask extends ParentTask
{
    public function __construct(
        protected PreferencesRepository $repository
    ) {
    }

    /**
     * @throws NotFoundException
     * @throws UpdateResourceFailedException
     */
    public function run(array $data, $id): Preferences
    {
        try {
            return $this->repository->update($data, $id);
        } catch (ModelNotFoundException) {
            throw new NotFoundException();
        } catch (Exception) {
            throw new UpdateResourceFailedException();
        }
    }
}
