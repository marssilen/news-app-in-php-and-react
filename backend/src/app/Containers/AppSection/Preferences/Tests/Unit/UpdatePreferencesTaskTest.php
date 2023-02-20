<?php

namespace App\Containers\AppSection\Preferences\Tests\Unit;

use App\Containers\AppSection\Preferences\Events\PreferencesUpdatedEvent;
use App\Containers\AppSection\Preferences\Models\Preferences;
use App\Containers\AppSection\Preferences\Tasks\UpdatePreferencesTask;
use App\Containers\AppSection\Preferences\Tests\TestCase;
use App\Ship\Exceptions\NotFoundException;
use Illuminate\Support\Facades\Event;

/**
 * Class UpdatePreferencesTaskTest.
 *
 * @group preferences
 * @group unit
 */
class UpdatePreferencesTaskTest extends TestCase
{
    // TODO TEST
    public function testUpdatePreferences(): void
    {
        Event::fake();
        $preferences = Preferences::factory()->create();
        $data = [
            // add some fillable fields here
            // 'some_field' => 'new_field_data',
        ];

        $updatedPreferences = app(UpdatePreferencesTask::class)->run($data, $preferences->id);

        $this->assertEquals($preferences->id, $updatedPreferences->id);
        // assert if fields are updated
        // $this->assertEquals($data['some_field'], $updatedPreferences->some_field);
        Event::assertDispatched(PreferencesUpdatedEvent::class);
    }

    public function testUpdatePreferencesWithInvalidId(): void
    {
        $this->expectException(NotFoundException::class);

        $noneExistingId = 777777;

        app(UpdatePreferencesTask::class)->run([], $noneExistingId);
    }
}
