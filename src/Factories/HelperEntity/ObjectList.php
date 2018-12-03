<?php

namespace Marat555\Eventbrite\Factories\HelperEntity;

class ObjectList
{
    /**
     * Pagination of paginated response
     *
     * @var Pagination|null
     */
    public $pagination;

    /**
     * Objects
     *
     * @var array
     */
    public $objects;

    /**
     * ObjectList constructor.
     * @param Pagination|null $pagination
     * @param array $objects
     */
    public function __construct(Pagination $pagination, array $objects)
    {
        $this->pagination = $pagination;
        $this->objects = $objects;
    }
}
