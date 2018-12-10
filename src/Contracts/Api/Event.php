<?php

namespace Marat555\Eventbrite\Contracts\Api;

use Marat555\Eventbrite\Factories\Entity\Event as EventEntity;

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
     * @return \Marat555\Eventbrite\Factories\Entity\Event
     */
    public function create(int $organizer_id, array $event);

    /**
     * Send update request to API
     *
     * @param int $id
     * @param array $event
     * @return \Marat555\Eventbrite\Factories\Entity\Event
     */
    public function update(int $id, array $event);

    /**
     * Delete an event
     *
     * @param $id
     * @return \Marat555\Eventbrite\Factories\Entity\Webhook
     */
    public function delete(int $id);

    /**
     * Publish an event
     *
     * @param int $id
     */
    public function publish(int $id);
}
