<?php

namespace Marat555\Eventbrite\Factories\Api;

use Marat555\Eventbrite\Factories\Entity\Venue as VenueEntity;
use Marat555\Eventbrite\Contracts\Api\Venue as VenueInterface;
use Marat555\Eventbrite\Factories\HelperEntity\ObjectList;
use Marat555\Eventbrite\Factories\HelperEntity\Pagination;

/**
 * Eventbrite API wrapper for Laravel
 *
 * @package  Eventbrite
 * @author   @marat555
 */
class Venue extends AbstractApi implements VenueInterface
{

    /**
     * The class of the entity we are working with
     *
     * @var VenueEntity
     */
    protected $class = VenueEntity::class;

    /**
     * The Eventbrite API endpoint of the resource type.
     *
     * @var string
     */
    protected $endpoint = "venues";

    /**
     * {@inheritdoc}
     * @throws \Exception
     */
    public function create(int $organizerId, array $venue)
    {
        $data['venue'] = $venue;
        $endpoint = "organizations/$organizerId/$this->endpoint";

        // Send "create" request
        $venue = $this->client->post($endpoint, $data, ['content_type' => 'json']);

        // Parse response
        $venue = json_decode($venue);

        return new VenueEntity($venue);
    }

    /**
     * {@inheritdoc}
     * @throws \Exception
     */
    public function list(int $organizationId)
    {
        $objects = null;
        $pagination = null;

        // Prep the endpoint
        $endpoint = "organizations/$organizationId/$this->endpoint";

        $response = $this->client->get($endpoint);
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
