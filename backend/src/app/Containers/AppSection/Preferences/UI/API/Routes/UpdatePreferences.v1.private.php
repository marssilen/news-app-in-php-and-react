<?php

/**
 * @apiGroup           Preferences
 * @apiName            UpdatePreferences
 *
 * @api                {PATCH} /v1/preferences/ Update Preferences
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

use App\Containers\AppSection\Preferences\UI\API\Controllers\UpdatePreferencesController;
use Illuminate\Support\Facades\Route;

Route::patch('preferences', [UpdatePreferencesController::class, 'updatePreferences'])
    ->middleware(['auth:api']);

