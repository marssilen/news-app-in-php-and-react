<?php

namespace App\Containers\AppSection\Preferences\Tests\Unit;

use App\Containers\AppSection\Preferences\Tests\TestCase;
use Illuminate\Support\Facades\Schema;

/**
 * Class PreferencesMigrationTest.
 *
 * @group preferences
 * @group unit
 */
class PreferencesMigrationTest extends TestCase
{
    public function test_preferences_table_has_expected_columns(): void
    {
        $columns = [
            'id',
            // add your migration columns
            'created_at',
            'updated_at',
        ];

        foreach ($columns as $column) {
            $this->assertTrue(Schema::hasColumn('preferences', $column));
        }
    }
}
