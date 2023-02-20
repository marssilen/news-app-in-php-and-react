<?php

/**
 * @apiGroup           Preferences
 * @apiName            FindPreferencesByUserId
 *
 * @api                {GET} /v1/preferences/
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
 * {
 *     // Insert the response of the request here...
 * }
 */

use App\Containers\AppSection\Preferences\UI\API\Controllers\FindPreferencesByUserIdController;
use Illuminate\Support\Facades\Route;

Route::get('preferences/', [FindPreferencesByUserIdController::class, 'findPreferencesByUserId'])
    ->middleware(['auth:api']);

