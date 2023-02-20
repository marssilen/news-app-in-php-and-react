<?php

namespace App\Containers\AppSection\News\UI\API\Controllers;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use Apiato\Core\Exceptions\InvalidTransformerException;
use App\Containers\AppSection\News\Actions\SearchNewsAction;
use App\Containers\AppSection\News\UI\API\Requests\SearchNewsRequest;
use App\Containers\AppSection\News\UI\API\Transformers\NewsTransformer;
use App\Ship\Exceptions\ValidationFailedException;
use App\Ship\Parents\Controllers\ApiController;

class SearchNewsController extends ApiController
{
    /**
     * @param SearchNewsRequest $request
     * @return array
     * @throws InvalidTransformerException
     * @throws ValidationFailedException
     * @throws CoreInternalErrorException
     */
    public function searchNews(SearchNewsRequest $request): array
    {
        $news = app(SearchNewsAction::class)
            ->run($request);

        return $news;
    }

}
