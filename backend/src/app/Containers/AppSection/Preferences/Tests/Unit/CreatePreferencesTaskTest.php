<?php

namespace App\Containers\AppSection\Preferences\Tests\Unit;

use App\Containers\AppSection\Preferences\Tasks\CreatePreferencesTask;
use App\Containers\AppSection\Preferences\Tests\TestCase;
use Illuminate\Support\Facades\Event;

/**
 * Class CreatePreferencesTaskTest.
 *
 * @group preferences
 * @group unit
 */
class CreatePreferencesTaskTest extends TestCase
{
    public function testCreatePreferences(): void
    {
        Event::fake();
        $data = [];

        $preferences = app(CreatePreferencesTask::class)->run($data);

        $this->assertModelExists($preferences);
//        Event::assertDispatched(PreferencesCreatedEvent::class);
    }

    // TODO TEST
//    public function testCreatePreferencesWithInvalidData(): void
//    {
//        $this->expectException(CreateResourceFailedException::class);
//
//        $data = [
//            // put some invalid data here
//            // 'invalid' => 'data',
//        ];
//
//        app(CreatePreferencesTask::class)->run($data);
//    }
}
