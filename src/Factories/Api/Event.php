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
     * List path contants
     */
    const ORGANIZATIONS = "organizations";
    const VENUES = "venue";
    const SERIES = "series";

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
        $endpoint = self::ORGANIZATIONS . "/$organizerId/$this->endpoint";

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
    public function delete(int $id)
    {
        /// Send delete request
        $event = $this->client->delete($this->getEndpoint(). '/' .$id);

        // Parse response
        $event = json_decode($event);

        // Create WebhookEntity from response
        return new EventEntity($event);
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
}
