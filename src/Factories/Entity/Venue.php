<?php

namespace Marat555\Eventbrite\Factories\Entity;

class Venue extends AbstractEntity
{

    /**
     * Venue ID
     *
     * @var string
     */
    public $id;

    /**
     * Venue name
     *
     * @var string
     */
    public $name;

    /**
     * Age restriction of the venue
     *
     * @var string
     */
    public $ageRestriction;

    /**
     * Venue capacity
     *
     * @var integer
     */
    public $capacity;

    /**
     * The address of the venue
     *
     * @var object
     */
    public $address;

    /**
     * Resource uri
     *
     * @var string
     */
    public $resourceUri;

    /**
     * Latitude portion of the address coordinates of the venue
     *
     * @var string
     */
    public $latitude;

    /**
     * Longitude portion of the address coordinates of the venue
     *
     * @var string
     */
    public $longitude;
}
