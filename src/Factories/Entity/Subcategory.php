<?php

namespace Marat555\Eventbrite\Factories\Entity;

class Subcategory extends AbstractEntity
{

    /**
     * The subcategory name
     *
     * @var string
     */
    public $name;

    /**
     * The category this belongs to
     * 
     * @var Category
     */
    public $parentCategory;
}