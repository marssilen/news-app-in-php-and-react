<?php

namespace App\Containers\AppSection\Preferences\UI\API\Tests\Functional;

use App\Containers\AppSection\Preferences\Models\Preferences;
use App\Containers\AppSection\Preferences\UI\API\Tests\ApiTestCase;

/**
 * Class DeletePreferencesTest.
 *
 * @group preferences
 * @group api
 */
class DeletePreferencesTest extends ApiTestCase
{
    protected string $endpoint = 'delete@v1/preferences/{id}';

    protected array $access = [
        'permissions' => '',
        'roles' => '',
    ];

    public function testDeleteExistingPreferences(): void
    {
        $preferences = Preferences::factory()->create();

        $response = $this->injectId($preferences->id)->makeCall();

        $response->assertStatus(204);
    }

    public function testDeleteNonExistingPreferences(): void
    {
        $invalidId = 7777;

        $response = $this->injectId($invalidId)->makeCall([]);

        $response->assertStatus(404);
    }

    // TODO TEST
    // add some roles and permissions to this route's request
    // then add them to the $access array above
    // uncomment this test to test accesses
//    public function testGivenHaveNoAccess_CannotDeletePreferences(): void
//    {
//        $this->getTestingUserWithoutAccess();
//        $preferences = Preferences::factory()->create();
//
//        $response = $this->injectId($preferences->id)->makeCall();
//
//        $response->assertStatus(403);
//    }
}
