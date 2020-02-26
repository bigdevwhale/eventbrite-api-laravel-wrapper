<?php

namespace Marat555\Eventbrite\Factories\Entity;

/**
 * The address of the venue
 */
class Address extends AbstractEntity
{

    /**
     * The street/location address (part 1)
     *
     * @var string
     */
    public $address_1;

    /**
     * The street/location address (part 2)
     *
     * @var string
     */
    public $address_2;

    /**
     * City
     *
     * @var string
     */
    public $city;

    /**
     * ISO 3166-2 2- or 3-character region code for the state, province, region, or district
     *
     * @var string
     */
    public $region;

    /**
     * Postal code
     *
     * @var string
     */
    public $postalCode;

    /**
     * ISO 3166-1 2-character international code for the country
     *
     * @var string
     */
    public $country;

    /**
     * Latitude portion of the address coordinates
     *
     * @var string
     */
    public $latitude;

    /**
     * Longitude portion of the address coordinates
     *
     * @var string
     */
    public $longitude;

    /**
     * Format of the address display localized to the address country
     *
     * @var string
     */
    public $localizedAddressDisplay;

    /**
     * Format of the address area display localized to the address country
     *
     * @var string
     */
    public $localizedAreaDisplay;
}
