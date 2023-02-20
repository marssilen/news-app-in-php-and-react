<?php

namespace App\Containers\AppSection\News\Factories;

use App\Containers\AppSection\News\Providers\NewsProviders\AbstractProvider;
use App\Containers\AppSection\News\Providers\NewsProviders\NYTimesProvider;
use App\Containers\AppSection\News\Providers\NewsProviders\NewsAPIProviderAdapter;
use App\Containers\AppSection\News\Providers\NewsProviders\TheGuardianProvider;

/**
 * Class NewsSourceFactory is responsible to create provider based on Factory design pattern
 *
 * @author    Ramin Rezaei
 * @version   v1.0
 */
class NewsSourceFactory
{
    /**
     * @param string $type
     * @return AbstractProvider
     */
    public function make(string $type): AbstractProvider
    {
        return match ($type) {
            "nytimes" => new NYTimesProvider(),
            "bbc" => new NewsAPIProviderAdapter(),
            "theguardian" => new TheGuardianProvider(),
        };
    }
}
