<?php

namespace Matat555\Eventbrite;

use Marat555\Eventbrite\Factories\Client;
use Marat555\Eventbrite\Factories\Api\Category;
use Marat555\Eventbrite\Factories\Api\Subcategory;

/**
 * Eventbrite API wrapper for Laravel
 *
 * @package  Eventbrite
 * @author   @marat555
 */
class Eventbrite {

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
}