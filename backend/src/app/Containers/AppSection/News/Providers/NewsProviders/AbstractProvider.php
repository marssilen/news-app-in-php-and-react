<?php

namespace App\Containers\AppSection\News\Providers\NewsProviders;

use App\Containers\AppSection\News\Contracts\Categorizable;
use App\Containers\AppSection\News\Contracts\Searchable;

/**
 * Class AbstractProvider every provider should follow the same rule
 *
 * @author    Ramin Rezaei
 * @version   v1.0
 */
abstract class AbstractProvider implements Searchable, Categorizable
{
    /**
     * Page Size for pagination
     */
    public const PAGE_SIZE = 10;
}
