<?php

namespace Marat555\Eventbrite\Factories\HelperEntity;

class FormatList
{
    /**
     * @var string
     */
    public $locale;

    /**
     * Objects
     *
     * @var array
     */
    public $objects;

    /**
     * FormatList constructor.
     * @param Pagination|null $pagination
     * @param array $objects
     */
    public function __construct(string $locale, array $objects)
    {
        $this->locale = $locale;
        $this->objects = $objects;
    }
}
