<?php

namespace Marat555\Eventbrite\Contracts\Api;

use Marat555\Eventbrite\Factories\Entity\Venue as VenueEntity;
use Marat555\Eventbrite\Factories\HelperEntity\ObjectList;

/**
 * A location where an Event happens.
 *
 * @package  Eventbrite
 * @author   @marat555
 */
interface Venue
{
    /**
     * {@inheritdoc}
     */
    public function get($id);

    /**
     * Send create request to API
     *
     * @param int $organizerId
     * @param array $venue
     * @return VenueEntity
     */
    public function create(int $organizerId, array $venue);

    /**
     * Send update request to API
     *
     * @param int $id
     * @param array $venue
     * @return VenueEntity
     */
    public function update(int $id, array $venue);

    /**
     * List of venues by OrganizationID
     *
     * @param int $organizationId
     * @return ObjectList
     */
    public function list(int $organizationId);
}
