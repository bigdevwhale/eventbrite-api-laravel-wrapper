<?php

namespace Marat555\Eventbrite;

use Marat555\Eventbrite\Factories\Client;
use Marat555\Eventbrite\Factories\Api\Category;
use Marat555\Eventbrite\Factories\Api\Subcategory;
use Marat555\Eventbrite\Factories\Api\Webhook;
use Marat555\Eventbrite\Factories\Api\Event;

/**
 * Eventbrite API wrapper for Laravel
 *
 * @package  Eventbrite
 * @author   @marat555
 */
class Eventbrite
{
    public $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function setClient($client)
    {
        $this->client = $client;
    }

    /**
     * @return Category
     */
    public function category()
    {
        return new Category($this->client);
    }

    /**
     * @return Subcategory
     */
    public function subcategory()
    {
        return new Subcategory($this->client);
    }

    /**
     * @return Webhook
     */
    public function webhook()
    {
        return new Webhook($this->client);
    }

    /**
     * @return Event
     */
    public function event()
    {
        return new Event($this->client);
    }
}
