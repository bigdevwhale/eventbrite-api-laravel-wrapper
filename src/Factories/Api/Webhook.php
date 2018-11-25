<?php

namespace Marat555\Eventbrite\Factories\Api;

use Marat555\Eventbrite\Factories\Entity\Webhook as WebhookEntity;
use Marat555\Eventbrite\Contracts\Api\Webhook as WebhookInterface;

/**
 * Eventbrite API wrapper for Laravel
 *
 * @package  Eventbrite
 * @author   @marat555
 */
class Webhook extends AbstractApi implements WebhookInterface
{

    /**
     * The class of the entity we are working with
     *
     * @var WebhookEntity
     */
    protected $class = WebhookEntity::class;

    /**
     * The Eventbrite API endpoint of the resource type.
     *
     * @var string
     */
    protected $endpoint = "webhooks";

    /**
     * {@inheritdoc}
     * @throws \Exception
     */
    public function create(WebhookEntity $webhook)
    {
        // Data
        $data = $webhook->toArray();

        // Send "create" request
        $webhook = $this->client->post($this->getEndpoint(), $data, ['content_type' => 'json']);

        // Parse response
        $webhook = json_decode($webhook);

        // Create WebhookEntity from response
        return new WebhookEntity($webhook);
    }

    /**
     * {@inheritdoc}
     * @throws \Exception
     */
    public function delete($id)
    {
        /// Send delete request
        $webhook = $this->client->delete($this->getEndpoint()."/".$id);

        // Parse response
        $webhook = json_decode($webhook);

        // Create WebhookEntity from response
        return new WebhookEntity($webhook);
    }
}
