<?php

namespace App\Containers\AppSection\Preferences\Tests\Unit;

use App\Containers\AppSection\Preferences\Events\PreferencesFoundByIdEvent;
use App\Containers\AppSection\Preferences\Models\Preferences;
use App\Containers\AppSection\Preferences\Tasks\FindPreferencesByUserIdTask;
use App\Containers\AppSection\Preferences\Tests\TestCase;
use App\Ship\Exceptions\NotFoundException;
use Illuminate\Support\Facades\Event;

/**
 * Class FindPreferencesByIdTaskTest.
 *
 * @group preferences
 * @group unit
 */
class FindPreferencesByIdTaskTest extends TestCase
{
    public function testFindPreferencesById(): void
    {
        Event::fake();
        $preferences = Preferences::factory()->create();

        $foundPreferences = app(FindPreferencesByUserIdTask::class)->run($preferences->id);

        $this->assertEquals($preferences->id, $foundPreferences->id);
        Event::assertDispatched(PreferencesFoundByIdEvent::class);
    }

    public function testFindPreferencesWithInvalidId(): void
    {
        $this->expectException(NotFoundException::class);

        $noneExistingId = 777777;

        app(FindPreferencesByUserIdTask::class)->run($noneExistingId);
    }
}
