<?php

namespace App\Containers\AppSection\Preferences\Tests\Unit;

use App\Containers\AppSection\Preferences\Models\Preferences;
use App\Containers\AppSection\Preferences\Tests\TestCase;

/**
 * Class PreferencesFactoryTest.
 *
 * @group preferences
 * @group unit
 */
class PreferencesFactoryTest extends TestCase
{
    public function testCreatePreferences(): void
    {
        $preferences = Preferences::factory()->make();

        $this->assertInstanceOf(Preferences::class, $preferences);
    }
}
