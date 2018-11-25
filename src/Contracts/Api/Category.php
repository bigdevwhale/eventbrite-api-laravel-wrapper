<?php

namespace Marat555\Eventbrite\Contracts\Api;

/**
 * An overarching category that an event falls into (vertical). Examples are “Music”, and “Endurance”.
 *
 * @package  Eventbrite
 * @author   @marat555
 */
interface Category
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
