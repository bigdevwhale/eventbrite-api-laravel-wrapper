<?php

namespace Marat555\Eventbrite\Factories\Entity;

class Format extends AbstractEntity
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
     * Localized format name
     *
     * @var string
     */
    public $nameLocalized;

    /**
     * Short name for a format
     *
     * @var string
     */
    public $shortName;

    /**
     * Localized short name for a format
     *
     * @var string
     */
    public $shortNameLocalized;

    /**
     * Is an absolute URL to the API endpoint that will return you the canonical representation of the format.
     *
     * @var string
     */
    public $resourceUri;
}
