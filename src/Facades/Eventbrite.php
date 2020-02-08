<?php

namespace Marat555\Eventbrite\Facades;

use Illuminate\Support\Facades\Facade;
use Marat555\Eventbrite\Contracts\Api\Category;
use Marat555\Eventbrite\Contracts\Api\DisplaySettings;
use Marat555\Eventbrite\Contracts\Api\Format;
use Marat555\Eventbrite\Contracts\Api\Media;
use Marat555\Eventbrite\Contracts\Api\Subcategory;
use Marat555\Eventbrite\Contracts\Api\User;
use Marat555\Eventbrite\Contracts\Api\Venue;
use Marat555\Eventbrite\Contracts\Api\Webhook;
use Marat555\Eventbrite\Contracts\Client;
use Marat555\Eventbrite\Factories\Entity\Event;

/**
 * @method static void setClient(Client $client)
 * @method static Category category()
 * @method static Subcategory subcategory()
 * @method static Webhook webhook()
 * @method static Event event()
 * @method static Venue venue()
 * @method static User user()
 * @method static Format format()
 * @method static DisplaySettings displaySettings()
 * @method static Media media()
 */
class Eventbrite extends Facade
{

    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'Marat555\Eventbrite\Eventbrite';
    }
}
