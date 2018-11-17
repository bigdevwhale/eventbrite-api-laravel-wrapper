<?php

namespace Marat555\Eventbrite\Factories\Entity;

class Subcategory extends AbstractEntity
{

    /**
     * @var string
     */
    public $name;

    /**
     * @var Category
     */
    public $parentCategory;
}