<?php

namespace App\Containers\AppSection\Preferences\Tests\Unit;

use App\Containers\AppSection\Preferences\Events\PreferencesListedEvent;
use App\Containers\AppSection\Preferences\Models\Preferences;
use App\Containers\AppSection\Preferences\Tasks\GetAllPreferencesTask;
use App\Containers\AppSection\Preferences\Tests\TestCase;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Event;

/**
 * Class GetAllPreferencesTaskTest.
 *
 * @group preferences
 * @group unit
 */
class GetAllPreferencesTaskTest extends TestCase
{
    public function testGetAllPreferences(): void
    {
        Event::fake();
        Preferences::factory()->count(3)->create();

        $foundPreferences = app(GetAllPreferencesTask::class)->run();

        $this->assertCount(3, $foundPreferences);
        $this->assertInstanceOf(LengthAwarePaginator::class, $foundPreferences);
        Event::assertDispatched(PreferencesListedEvent::class);
    }
}
