<?php

namespace Marat555\Eventbrite\Factories\Entity;

class Category extends AbstractEntity
{

    /**
     * Category ID
     *
     * @var string
     */
    public $id;

    /**
     * The category name
     *
     * @var string
     */
    public $name;

    /**
     * The category name localized to the current locale (if available)
     *
     * @var string
     */
    public $nameLocalized;

    /**
     * A shorter name for display in sidebars and other small spaces.
     *
     * @var string
     */
    public $shortName;

    /**
     * Translated short category name
     *
     * @var string
     */
    public $shortNameLocalized;

    /**
     * @var string
     */
    public $resourceUri;
}
