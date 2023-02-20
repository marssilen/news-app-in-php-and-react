<?php

namespace App\Containers\AppSection\News\Tasks;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use App\Containers\AppSection\News\Factories\NewsSourceFactory;
use App\Ship\Parents\Tasks\Task as ParentTask;
use SplDoublyLinkedList;

/**
 * Class SearchNewsTask
 *
 * @author    Ramin Rezaei
 * @version   v1.0
 */
class SearchNewsTask extends ParentTask
{

    /**
     * @param array $providers
     * @param string $query
     * @param int $page
     * @return array
     * @throws CoreInternalErrorException
     */
    public function run(array $providers, string $query, int $page, array $categories, array $authors): array
    {
        $listOfProviders = $this->createSourceProviders($providers);

        $merged = collect([]);
        for ($listOfProviders->rewind(); $listOfProviders->valid(); $listOfProviders->next()) {
            $merged = $merged->merge(collect($listOfProviders->current()->search($query, $page, $categories, $authors)));
        }

        return $merged->all();
    }

    /**
     * @param array $providers
     * @return SplDoublyLinkedList
     */
    private function createSourceProviders(array $providers): SplDoublyLinkedList
    {
        $sourceFactory = new NewsSourceFactory();
        $list = new SplDoublyLinkedList();

        foreach ($providers as $provider) {
            $list->push($sourceFactory->make($provider));
        }

        return $list;
    }
}
