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
    public function create(int $organizerId, array $event)
    {
        $data["event"] = $event;
        $endpoint = "$this->subEndpoint/$organizerId/$this->endpoint";

        // Send "create" request
        $event = $this->client->post($endpoint, $data, ['content_type' => 'json']);

        // Parse response
        $event = json_decode($event);

        return new EventEntity($event);
    }

    /**
     * {@inheritdoc}
     * @throws \Exception
     */
    public function publish(int $eventId)
    {
        // Prep the endpoint
        $endpoint = $this->getEndpoint() . "/" . $eventId . "/publish";

        // Send "create" request
        $event = $this->client->post($endpoint);

        // Parse response
        $event = json_decode($event);

        return $event;
    }

    /**
     * {@inheritdoc}
     * @throws \Exception
     */
    public function delete(int $id)
    {
        /// Send delete request
        $event = $this->client->delete($this->getEndpoint()."/".$id);

        // Parse response
        $event = json_decode($event);

        // Create WebhookEntity from response
        return new EventEntity($event);
    }
}
