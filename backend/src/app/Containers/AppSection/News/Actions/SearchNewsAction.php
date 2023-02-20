<?php

namespace App\Containers\AppSection\News\Actions;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use App\Containers\AppSection\News\Tasks\SearchNewsTask;
use App\Containers\AppSection\News\UI\API\Requests\SearchNewsRequest;
use App\Ship\Parents\Actions\Action as ParentAction;
use Prettus\Repository\Exceptions\RepositoryException;

class SearchNewsAction extends ParentAction
{
    /**
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function run(SearchNewsRequest $request): mixed
    {
        $sanitizedData = $request->sanitizeInput([
            'providers',
            'query',
            'page',
            'categories',
            'authors',
        ]);

        return app(SearchNewsTask::class)
            ->run($sanitizedData['providers'], $sanitizedData['query'], $sanitizedData['page'],
                $sanitizedData['categories'] ?? [], $sanitizedData['authors'] ?? []
            );
    }
}
