<?php

namespace Marat555\Eventbrite\Contracts\Api;

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
     * @param \Marat555\Eventbrite\Factories\Entity\Event $event
     * @return \Marat555\Eventbrite\Factories\Entity\Event
     */
    public function create(\Marat555\Eventbrite\Factories\Entity\Event $event);

    /**
     * Delete a webhook
     *
     * @param $id
     * @return \Marat555\Eventbrite\Factories\Entity\Webhook
     */
    public function delete($id);
}
