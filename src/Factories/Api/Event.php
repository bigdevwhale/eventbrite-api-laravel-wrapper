<?php

namespace Marat555\Eventbrite\Factories\Api;

use Marat555\Eventbrite\Factories\Entity\Event as EventEntity;
use Marat555\Eventbrite\Contracts\Api\Event as EventInterface;
use Marat555\Eventbrite\Factories\HelperEntity\Pagination;
use Marat555\Eventbrite\Factories\HelperEntity\ObjectList;

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
     * {@inheritdoc}
     * @throws \Exception
     */
    public function create(int $organizerId, array $event)
    {
        $data['event'] = $event;
        $endpoint = "organizations/$organizerId/$this->endpoint";

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
        $endpoint = $this->getEndpoint() . '/' . $eventId . '/publish';

        // Send "publish" request
        $response = $this->client->post($endpoint, null, ['content_type' => 'json']);

        // Parse response
        $response = json_decode($response, true);

        return isset($response['published']) ? $response['published'] : false;
    }

    /**
     * {@inheritdoc}
     * @throws \Exception
     */
    public function unpublish(int $eventId)
    {
        // Prep the endpoint
        $endpoint = $this->getEndpoint() . '/' . $eventId . '/unpublish';

        // Send "unpublish" request
        $response = $this->client->post($endpoint, null, ['content_type' => 'json']);

        // Parse response
        $response = json_decode($response, true);

        return isset($response['unpublished']) ? $response['unpublished'] : false;
    }

    /**
     * {@inheritdoc}
     * @throws \Exception
     */
    public function list(string $by, int $id, array $filterParams = [])
    {
        $objects = null;
        $pagination = null;

        // Prep the endpoint
        $endpoint = "$by/$id/$this->endpoint";

        $response = $this->client->get($endpoint, $filterParams);
        $response = json_decode($response);

        if (property_exists($response, "$this->endpoint")) {
            $objects = array_map(function ($object) {
                return $this->instantiateEntity($object);
            }, $response->{$this->endpoint});
        }

        if (property_exists($response, "$this->pagination")) {
            $pagination = new Pagination($response->{$this->pagination});
        }

        return new ObjectList($pagination, $objects);
    }

    /**
     * {@inheritdoc}
     * @throws \Exception
     */
    public function cancel(int $eventId)
    {
        // Prep the endpoint
        $endpoint = $this->getEndpoint() . "/" . $eventId . "/cancel";

        // Send "cancel" request
        $response = $this->client->post($endpoint, null, ['content_type' => 'json']);

        // Parse response
        $response = json_decode($response, true);

        return isset($response['canceled']) ? $response['canceled'] : false;
    }

    /**
     * {@inheritdoc}
     * @throws \Exception
     */
    public function copy(int $eventId)
    {
        // Prep the endpoint
        $endpoint = $this->getEndpoint() . "/" . $eventId . "/copy";

        // Send "copy" request
        $response = $this->client->post($endpoint, null, ['content_type' => 'json']);

        // Parse response
        $event = json_decode($response);

        return new EventEntity($event);
    }
}
