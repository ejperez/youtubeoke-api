<?php

use Illuminate\Support\Facades\Route;

Route::get('search/{q}', function (string $q) {
    $ytAPIKey = env('YOUTUBE_DATA_API_KEY', null);

    if (!$ytAPIKey) {
        return response('API key not set or missing search parameter', 400);
    }

    $q = urlencode($q);
    $ytAPIKey = urlencode($ytAPIKey);
    $url = "https://www.googleapis.com/youtube/v3/search?part=snippet&maxResults=50&q=$q&type=video&key=$ytAPIKey";
    $response = json_decode(@file_get_contents($url));

    return response()->json($response);
});