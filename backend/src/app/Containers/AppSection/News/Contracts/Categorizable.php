<?php

namespace App\Containers\AppSection\News\Contracts;

interface Categorizable
{
    /**
     * get default categories to be used in api
     * @return array standard formatted output
     */
    public function getCategories(): array;
}
