<?php

namespace App\Containers\AppSection\Preferences\UI\API\Tests\Functional;

use App\Containers\AppSection\Preferences\Models\Preferences;
use App\Containers\AppSection\Preferences\UI\API\Tests\ApiTestCase;
use Hashids;
use Illuminate\Testing\Fluent\AssertableJson;

/**
 * Class FindPreferencesByIdTest.
 *
 * @group preferences
 * @group api
 */
class FindPreferencesByIdTest extends ApiTestCase
{
    protected string $endpoint = 'get@v1/preferences/{id}';

    protected array $access = [
        'permissions' => '',
        'roles' => '',
    ];

    public function testFindPreferences(): void
    {
        $preferences = Preferences::factory()->create();

        $response = $this->injectId($preferences->id)->makeCall();

        $response->assertStatus(200);
        $response->assertJson(
            fn (AssertableJson $json) =>
                $json->has('data')
                    ->where('data.id', Hashids::encode($preferences->id))
                    ->etc()
        );
    }

    public function testFindNonExistingPreferences(): void
    {
        $invalidId = 7777;

        $response = $this->injectId($invalidId)->makeCall([]);

        $response->assertStatus(404);
    }

    public function testFindFilteredPreferencesResponse(): void
    {
        $preferences = Preferences::factory()->create();

        $response = $this->injectId($preferences->id)->endpoint($this->endpoint . '?filter=id')->makeCall();

        $response->assertStatus(200);
        $response->assertJson(
            fn (AssertableJson $json) =>
                $json->has('data')
                    ->where('data.id', $preferences->getHashedKey())
                    ->missing('data.object')
        );
    }

    // TODO TEST
    // if your model have relationships which can be included into the response then
    // uncomment this test
    // modify it to your needs
    // test the relation
//    public function testFindPreferencesWithRelation(): void
//    {
//        $preferences = Preferences::factory()->create();
//        $relation = 'roles';
//
//        $response = $this->injectId($preferences->id)->endpoint($this->endpoint . "?include=$relation")->makeCall();
//
//        $response->assertStatus(200);
//        $response->assertJson(
//            fn (AssertableJson $json) =>
//              $json->has('data')
//                  ->where('data.id', $preferences->getHashedKey())
//                  ->count("data.$relation.data", 1)
//                  ->where("data.$relation.data.0.name", 'something')
//                  ->etc()
//        );
//    }
}
