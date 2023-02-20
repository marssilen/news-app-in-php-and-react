<?php

namespace App\Containers\AppSection\Preferences\Data\Factories;

use App\Containers\AppSection\Preferences\Models\Preferences;
use App\Ship\Parents\Factories\Factory as ParentFactory;

class PreferencesFactory extends ParentFactory
{
    protected $model = Preferences::class;

    public function definition(): array
    {
        return [
            // Add your model fields here
            // 'name' => $this->faker->name(),
        ];
    }
}
