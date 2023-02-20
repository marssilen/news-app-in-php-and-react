<?php

namespace App\Containers\AppSection\News\Contracts;

interface Searchable
{
    /**
     * search for articles and news
     * @param string $query
     * @param int $page used in pagination
     * @param array $categories
     * @param array $authors
     * @return array standard formatted output
     */
    public function search(string $query, int $page, array $categories, array $authors): array;
}
