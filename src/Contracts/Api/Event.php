<?php

namespace Marat555\Eventbrite\Contracts\Api;

use Marat555\Eventbrite\Factories\Entity\Event as EventEntity;
use Marat555\Eventbrite\Factories\HelperEntity\ObjectList;

/**
 * The Event object represents an Eventbrite Event. An Event is owned by one Organization..
 *
 * @package  Eventbrite
 * @author   @marat555
 */
interface Event
{
    /**
     * {@inheritdoc}
     */
    public function all();

    /**
     * {@inheritdoc}
     */
    public function get($id);

    /**
     * Send create request to API
     *
     * @param int $organizer_id
     * @param array $event
     * @return EventEntity
     */
    public function create(int $organizer_id, array $event);

    /**
     * Send update request to API
     *
     * @param int $id
     * @param array $event
     * @return EventEntity
     */
    public function update(int $id, array $event);

    /**
     * Delete an event
     *
     * @param $id
     * @return boolean
     */
    public function delete(int $id);

    /**
     * Publish an event
     *
     * @param int $id
     * @return boolean
     */
    public function publish(int $id);

    /**
     * Unpublish an event
     *
     * @param int $id
     * @return boolean
     */
    public function unpublish(int $id);

    /**
     * List of events by VenueID|OrganizationID|SeriesID
     *
     * @param string $by - 'venue'|'organization'|'series'
     * @param int $id
     * @param array $filterParams
     * @return ObjectList
     */
    public function list(string $by, int $id, array $filterParams = []);

    /**
     * Copy an event
     *
     * @param $id
     * @return EventEntity
     */
    public function copy(int $id);

    /**
     * Cancel an event
     *
     * @param $id
     * @return boolean
     */
    public function cancel(int $id);
}
