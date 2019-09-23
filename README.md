# Laravel Eventbrite

Eventbrite API wrapper for Laravel. This package provides a simple interface to Eventbite's (awesome) API. Organize Eventbrite integration with expressive, clean PHP.

## Requirements
PHP >= 7.2  
Laravel >= 6.0


## Installation
Laravel Eventbrite uses composer to make installation a breeze.


**Install via composer** 
``` bash
composer require marat555/eventbrite
```


**Register service provider**
Add the Laravel Eventbrite service provider to your `config/app.php` file in the providers key
```php
'providers' => [
    // ... other providers
    Marat555\Eventbrite\EventbriteServiceProvider::class,
]
```


**Eventbrite facade alias**
Then add the `Eventbrite` facade to your `aliases` key: 'Eventbrite' => Marat555\Eventbrite\Facades\Eventbrite::class.  



## Configuration
Configuration can be done via your `.env` file.
```
EVENTBRITE_BASE_URL=https://www.eventbriteapi.com/v3/
EVENTBRITE_TOKEN=xxxxxxx
````
>You may also publish the config file to `config/eventbrite.pzhp` for editing:
`php artisan vendor:publish --provider="Marat555\Eventbrite\EventbriteServiceProvider"`
 
 
## Usage
Laravel Eventbrite is incredibly intuitive to use. 

### Introduction
Already configured everything and just want to see it in action? Take a look at the example code below.
```php
<?php

namespace App\Http\Controllers;

use Eventbrite;
use App\Http\Controllers\Controller;

class EventbriteController extends Controller
{
    public function getEvent(int $eventId)
    {
        return response()->json(Eventbrite::event()->get($eventId));
    }
}
```

### Event
#### Retrieve an Event by Event ID
``` php
Eventbrite::event()->get($eventId);
```

#### Create a new Event
```php
Eventbrite::event()->create(int $organizerId, array $event);
```

#### Update Event by Event ID
```php
Eventbrite::event()->update(int $eventId, array $event);
```

#### List Events by Venue ID
```php
Eventbrite::event()->list('venue', int $venueId, array $filterParams = []);
```

#### List Events by Organization ID
```php
Eventbrite::event()->list('organizations', int $organizationId, array $filterParams = []);
```

#### List Events by Event Series ID
```php
Eventbrite::event()->list('series', int $seriesId, array $filterParams = []);
```

#### Publish an Event. Returns a boolean indicating the success or failure of the publish action.
```php
Eventbrite::event()->publish(int $eventId);
```

#### Unpublish an Event. Returns a boolean indicating the success or failure of the unpublish action.
```php
Eventbrite::event()->unpublish(int $eventId);
```

#### Cancel an Event. Returns a boolean indicating the success or failure of the cancel action.
```php
Eventbrite::event()->cancel(int $eventId);
```

#### Delete an Event. Returns a boolean indicating the success or failure of the delete action.
```php
Eventbrite::event()->delete(int $eventId);
```

### Category
#### Retrieve a Category by Category ID
```php 
Eventbrite::category()->get(int $categoryId);
```

#### List of Categories
```php 
Eventbrite::category()->all(int $categoryId);
```

### Subcategory
#### Retrieve a Subcategory by Subcategory ID
```php 
Eventbrite::subcategory()->get(int $subcategoryId);
```

#### List of Subcategories
```php 
Eventbrite::subcategory()->all(int $categoryId);
```

### Display Settings
#### Retrieve the Display Settings by Event ID
```php 
Eventbrite::displaySettings()->get(int $eventId);
```

#### Update Display Settings
```php 
Eventbrite::displaySettings()->update(int $eventId, array $displaySettings);
```

### User
#### Retrieve a User by User ID
```php 
Eventbrite::user()->get($userId);
```

#### Retrieve your User
```php 
Eventbrite::user()->me();
```

### Venue
#### Retrieve a Venue by Venue ID
```php 
Eventbrite::venue()->get($venueId);
```

#### Create new Venue
```php 
Eventbrite::venue()->create(int $organizerId, array $venue);
```

#### Update a Venue
```php 
Eventbrite::venue()->update(int $venueId, array $venue);
```

#### List Venues by Organization ID
```php 
Eventbrite::venue()->list(int $organizationId);
```

### Format

#### Retrieve a Format by Format ID
```php 
Eventbrite::format->get($formatId);
```

#### List Formats
```php 
Eventbrite::format->list();
```


### Media

#### Retrieve Media by Media ID
```php 
Eventbrite::media->get($formatId);
```

#### Create a Media Upload
```php 
Eventbrite::media->createUpload(array $mediaUpload);
```

#### Retrieve a Media Upload
```php 
Eventbrite::media->createUpload(array $mediaUploadType);
```

### Query Building 
The wrapper also provides a convenient way for you to build fairly elaborate Eventbrite API requests.
The following methods return the instance so you can chain more constraints onto the request as required.

#### Expansions
Eventbrite has many models that refer to each other, and often you’ll want to fetch related data along with the primary model you’re querying - 
for example, you’ll want to fetch an event along with organizer.

```php
Eventbrite::event()->expand('organizer')->get($eventId);

```

### Handling Exceptions
The Eventbrite API will return errors as required. I am still looking for a nicer way to handle these exceptions... For the time being, simply wrap your call in a try/catch block.

```php
try {
    
    Eventbrite::event()->publish(1234);
    
} catch(EventbriteErrorException $e) {
    $response = $e->getResponse();
    $responseBodyAsString = $response->getBody()->getContents();
    echo $responseBodyAsString;
}
```

## Implemented Eventbrite API Endpoints
- Event
  - get
  - create
  - update
  - list
    - byEventSeriesId
    - byVenueId
    - byOrganizationId
  - publish
  - unpublish
  - cancel
  - delete
- Category
  - get
  - list
- Subcategory
  - get
  - list 
- Display Settings
  - getByEventId
  - update
- User
  - get 
  - me
- Venue
  - get
  - update
  - list
- Format
  - get
  - list
- Media
  - get
  - createUpload
  - createUpload

The Eventbrite API is extensive. I've attempted to cover all of the key endpoints  but there are endpoints that are currently unimplemented.

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
