<?php

namespace Marat555\Eventbrite\Contracts\Api;

/**
 * A more specific category that an event falls into, sitting underneath a category.
 *
 * @package  Eventbrite
 * @author   @marat555
 */
interface Subcategory
{
    
    /**
     * {@inheritdoc}
     */
    public function all();

    /**
     * {@inheritdoc}
     */
    public function get($id);
}
