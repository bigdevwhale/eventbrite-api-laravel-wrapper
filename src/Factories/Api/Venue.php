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
     * @param int $organizer_id
     * @param array $event
     * @return VenueEntity
     */
    public function create(int $organizer_id, array $event);

    /**
     * Send update request to API
     *
     * @param int $id
     * @param array $event
     * @return VenueEntity
     */
    public function update(int $id, array $event);

    /**
     * List of venues by OrganizationID
     *
     * @param int $organizationId
     * @param array $filterParams
     * @return ObjectList
     */
    public function list(int $organizationId);
}
