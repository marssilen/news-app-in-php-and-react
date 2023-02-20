<?php

namespace App\Containers\AppSection\Preferences\Tests\Unit;

use App\Containers\AppSection\Preferences\Events\PreferencesDeletedEvent;
use App\Containers\AppSection\Preferences\Models\Preferences;
use App\Containers\AppSection\Preferences\Tasks\DeletePreferencesTask;
use App\Containers\AppSection\Preferences\Tests\TestCase;
use App\Ship\Exceptions\NotFoundException;
use Illuminate\Support\Facades\Event;

/**
 * Class DeletePreferencesTaskTest.
 *
 * @group preferences
 * @group unit
 */
class DeletePreferencesTaskTest extends TestCase
{
    public function testDeletePreferences(): void
    {
        Event::fake();
        $preferences = Preferences::factory()->create();

        $result = app(DeletePreferencesTask::class)->run($preferences->id);

        $this->assertEquals(1, $result);
        Event::assertDispatched(PreferencesDeletedEvent::class);
    }

    public function testDeletePreferencesWithInvalidId(): void
    {
        $this->expectException(NotFoundException::class);

        $noneExistingId = 777777;

        app(DeletePreferencesTask::class)->run($noneExistingId);
    }
}
