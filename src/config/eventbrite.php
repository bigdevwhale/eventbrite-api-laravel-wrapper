<?php

/*
|--------------------------------------------------------------------------
| Laravel PHP Facade/Wrapper for the Eventbrite Data API v3
|--------------------------------------------------------------------------
|
| Here is where you can set your token and secret for Eventbrite API. In case you do not
| have it, you can read about it on: https://www.eventbrite.com/developer/v3/api_overview/authentication/
*/

return [
    'token'  => env('EVENTBRITE_TOKEN', 'YOUR_TOKEN'),
    'secret' => env('EVENTBRITE_SECRET', 'YOUR_SECRET')
];
