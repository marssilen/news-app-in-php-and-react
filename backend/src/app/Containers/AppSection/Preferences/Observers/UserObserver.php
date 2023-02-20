<?php

namespace App\Containers\AppSection\Preferences\Observers;

use App\Containers\AppSection\Preferences\Tasks\CreatePreferencesTask;
use App\Containers\AppSection\User\Models\User;

class UserObserver
{
    /**
     * create Preferences for user
     */
    public function created(User $user): void
    {
        app(CreatePreferencesTask::class)->run(['user_id'=>$user->id]);
    }
}
