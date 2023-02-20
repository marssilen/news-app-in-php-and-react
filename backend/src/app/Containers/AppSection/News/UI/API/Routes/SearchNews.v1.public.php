<?php

/**
 * @apiName            searchNews
 *
 * @api                {GET} /v1/search/news search news and articles
 * @apiDescription     Endpoint description here...
 *
 * @apiVersion         1.0.0
 * @apiPermission      Authenticated ['permissions' => '', 'roles' => '']
 *
 * @apiHeader          {String} accept=application/json
 * @apiHeader          {String} authorization=Bearer
 *
 * @apiParam           {String} parameters here...
 *
 * @apiSuccessExample  {json} Success-Response:
 * HTTP/1.1 200 OK
 *
 * [
 * {
 * "headline": "Trump-era Chinese spy balloons went undetected",
 * "category": "general",
 * "pub_date": "2023-02-07T16:43:17Z",
 * "web_url": "https://www.bbc.co.uk/news/world-us-canada-64547394",
 * "author": "https://www.facebook.com/bbcnews",
 * "source": "BBC News"
 * }
 * ]
 */

use App\Containers\AppSection\News\UI\API\Controllers\SearchNewsController;
use Illuminate\Support\Facades\Route;

Route::get('search/news', [SearchNewsController::class, 'searchNews']);
// ->middleware(['auth:api']);

