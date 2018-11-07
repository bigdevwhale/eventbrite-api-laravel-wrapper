<?php

namespace Marat555\Eventbrite\Factories\Entity;

class Category extends AbstractEntity
{

    /**
     * @var string
     */
    public $name;

    /**
     * @var string
     */
    public $nameLocalized;

    /**
     * @var string
     */
    public $shortName;

    /**
     * @var Subcategory[]
     */
    public $subcategories;
}