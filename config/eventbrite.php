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
    'baseUrl'	=> env('EVENTBRITE_BASE_URL') ? env('EVENTBRITE_BASE_URL') : 'https://www.eventbriteapi.com/v3/',
    'token'  => env('EVENTBRITE_TOKEN', 'J2TJ4OQNA5PENREIGBAY1')
];
