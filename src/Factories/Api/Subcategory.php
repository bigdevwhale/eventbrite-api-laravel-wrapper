<?php

namespace Marat555\Eventbrite\Factories\Api;

use Marat555\Eventbrite\Factories\Entity\SubCategory as SubcategoryEntity;

/**
 * Eventbrite API wrapper for Laravel
 *
 * @package  Eventbrite
 * @author   @marat555
 */
class Subcategory extends AbstractApi implements \Marat555\Eventbrite\Contracts\Api\Subcategory
{

    /**
     * The class of the entity we are working with
     *
     * @var SubcategoryEntity
     */
    protected $class = SubcategoryEntity::class;

    /**
     * The Eventbrite API endpoint of the resource type.
     *
     * @var string
     */
    protected $endpoint = "subcategories";

}