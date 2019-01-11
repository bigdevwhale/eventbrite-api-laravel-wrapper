<?php

namespace Marat555\Eventbrite\Contracts\Api;

use Marat555\Eventbrite\Factories\Entity\Venue as VenueEntity;
use Marat555\Eventbrite\Factories\HelperEntity\ObjectList;

/**
 * Format
 *
 * @package  Eventbrite
 * @author   @marat555
 */
interface Format
{
    /**
     * {@inheritdoc}
     */
    public function get($id);

    /**
     * List of venues by OrganizationID
     *
     * @return ObjectList
     */
    public function list();
}
