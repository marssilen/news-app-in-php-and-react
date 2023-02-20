<?php

namespace App\Containers\AppSection\News\Providers\NewsProviders;

use jcobhams\NewsApi\NewsApi;

/**
 * Class NewsAPIProviderAdapter. This class uses standard newsapi package and performs as an adapter
 * This class uses adapter design pattern
 * @author    Ramin Rezaei
 * @version   v1.0
 */
class NewsAPIProviderAdapter extends AbstractProvider
{
    /**
     * news api object which uses standard newsapi package
     */
    private $newsapi;

    /**
     * init newapi object with api key to access the server
     */
    public function __construct()
    {
        $this->newsapi = new NewsApi(config('appSection-news.NEWSAPI_API_KEY'));
    }

    /**
     * @inheritDoc
     * @throws \jcobhams\NewsApi\NewsApiException
     */
    public function search(string $query, int $page, array $categories, array $authors): array
    {
        return $this->convertToCustomFormat($this->newsapi->getEverything($query,
            'bbc-news', null, null, null,
            null, null, null, AbstractProvider::PAGE_SIZE, $page));
    }

    /**
     * converts the newsapi api output to the standard format
     * @param array $json
     * @return array
     */
    private function convertToCustomFormat(array $json): array
    {
        return collect($json['articles'])->map(function (array $article) {
            return (object)
            [
                'headline' => $article['title'] ?? '',
                'category' => $article['category'] ?? '',
                'pub_date' => $article['publishedAt'] ?? '',
                'web_url' => $article['url'] ?? '',
                'author' => $article['author'] ?? '',
                'source' => $article['source']['name'] ?? ''
            ];
        })->toArray();
    }

    /**
     * @inheritDoc
     */
    public function getCategories(): array
    {
        return $this->newsapi->getCategories();
    }
}
