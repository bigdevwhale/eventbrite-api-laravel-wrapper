<?php

namespace Marat555\Eventbrite\Factories\Api;

use Marat555\Eventbrite\Factories\Entity\Webhook as WebhookEntity;

/**
 * Eventbrite API wrapper for Laravel
 *
 * @package  Eventbrite
 * @author   @marat555
 */
class Webhook extends AbstractApi implements \Marat555\Eventbrite\Contracts\Api\Webhook
{

    /**
     * The class of the entity we are working with
     *
     * @var CategoryEntity
     */
    protected $class = WebhookEntity::class;

    /**
     * The Eventbrite API endpoint of the resource type.
     *
     * @var string
     */
    protected $endpoint = "webhooks";

    /**
     * Send create request to API
     *
     * @param \Marat555\Eventbrite\Factories\Entity\Webhook $webhook
     * @return \Marat555\Eventbrite\Factories\Entity\Webhook
     */
    public function create(\Marat555\Eventbrite\Factories\Entity\Webhook $webhook)
    {
        // TODO: Implement create() method.
    }

    /**
     * Delete a webhook
     *
     * @param $id
     * @return \Marat555\Eventbrite\Factories\Entity\Webhook
     */
    public function delete($id)
    {
        // TODO: Implement delete() method.
    }
}