<?php

namespace Marat555\Eventbrite\Factories\Api;

use Marat555\Eventbrite\Factories\Entity\Event as EventEntity;
use Marat555\Eventbrite\Contracts\Api\Event as EventInterface;

/**
 * Eventbrite API wrapper for Laravel
 *
 * @package  Eventbrite
 * @author   @marat555
 */
class Event extends AbstractApi implements EventInterface
{

    /**
     * The class of the entity we are working with
     *
     * @var EventEntity
     */
    protected $class = EventEntity::class;

    /**
     * The Eventbrite API endpoint of the resource type.
     *
     * @var string
     */
    protected $endpoint = "events";

    /**
     * The Eventbrite API subendpoint
     *
     * @var string
     */
    protected $subEndpoint = "organizations";

    /**
     * {@inheritdoc}
     * @throws \Exception
     */
    public function create(int $organizerId, EventEntity $event)
    {
        $data["event"] = $event->toArray();
        $endpoint = "$this->subEndpoint/$organizerId/$this->endpoint";

        // Send "create" request
        $event = $this->client->post($endpoint, $data, ['content_type' => 'json']);

        // Parse response
        $event = json_decode($event);

        if (property_exists($event, $this->endpoint)) {
            $event = $event->{$this->endpoint}[0];
        }

        // Create WebhookEntity from response
        return new EventEntity($event);
    }

    /**
     * {@inheritdoc}
     * @throws \Exception
     */
    public function delete($id)
    {
        /// Send delete request
        $event = $this->client->delete($this->getEndpoint()."/".$id);

        // Parse response
        $event = json_decode($event);

        // Create WebhookEntity from response
        return new EventEntity($event);
    }
}
