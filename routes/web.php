<?php

/**
 * Web Routes not available in API
 *
 * In this applicatio, web routes are not available
 * in the API context. This file is intentionally left empty.
 */

Route::get('/', function () {
    //application version
    return response()->json(['version' => app()->version()]);
});