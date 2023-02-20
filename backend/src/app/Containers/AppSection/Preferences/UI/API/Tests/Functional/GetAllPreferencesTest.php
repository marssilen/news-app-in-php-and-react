<?php

namespace App\Containers\AppSection\Preferences\UI\API\Tests\Functional;

use App\Containers\AppSection\Preferences\Models\Preferences;
use App\Containers\AppSection\Preferences\UI\API\Tests\ApiTestCase;
use Illuminate\Testing\Fluent\AssertableJson;

/**
 * Class GetAllPreferencesTest.
 *
 * @group preferences
 * @group api
 */
class GetAllPreferencesTest extends ApiTestCase
{
    protected string $endpoint = 'get@v1/preferences';

    protected array $access = [
        'permissions' => '',
        'roles' => '',
    ];

    public function testGetAllPreferencesByAdmin(): void
    {
        $this->getTestingUserWithoutAccess(createUserAsAdmin: true);
        Preferences::factory()->count(2)->create();

        $response = $this->makeCall();

        $response->assertStatus(200);
        $responseContent = $this->getResponseContentObject();

        $this->assertCount(2, $responseContent->data);
    }

    // TODO TEST
    // add some roles and permissions to this route's request
    // then add them to the $access array above
    // uncomment this test to test accesses
//    public function testGetAllPreferencesByNonAdmin(): void
//    {
//        $this->getTestingUserWithoutAccess();
//        Preferences::factory()->count(2)->create();
//
//        $response = $this->makeCall();
//
//        $response->assertStatus(403);
//        $response->assertJson(
//            fn (AssertableJson $json) =>
//                $json->has('message')
//                    ->where('message', 'This action is unauthorized.')
//                    ->etc()
//        );
//    }

    // TODO TEST
//    public function testSearchPreferencesByFields(): void
//    {
//        Preferences::factory()->count(3)->create();
//        // create a model with specific field values
//        $preferences = Preferences::factory()->create([
//            // 'name' => 'something',
//        ]);
//
//        // search by the above values
//        $response = $this->endpoint($this->endpoint . "?search=name:" . urlencode($preferences->name))->makeCall();
//
//        $response->assertStatus(200);
//        $response->assertJson(
//            fn (AssertableJson $json) =>
//                $json->has('data')
//                    // ->where('data.0.name', $preferences->name)
//                    ->etc()
//        );
//    }

    public function testSearchPreferencesByHashID(): void
    {
        $preferences = Preferences::factory()->count(3)->create();
        $secondPreferences = $preferences[1];

        $response = $this->endpoint($this->endpoint . '?search=id:' . $secondPreferences->getHashedKey())->makeCall();

        $response->assertStatus(200);
        $response->assertJson(
            fn (AssertableJson $json) =>
                $json->has('data')
                     ->where('data.0.id', $secondPreferences->getHashedKey())
                    ->etc()
        );
    }
}
