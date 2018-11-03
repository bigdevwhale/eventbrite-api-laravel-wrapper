<?php

namespace Matat555\Eventbrite;

use Marat555\Eventbrite\Factories\Client;

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
}