<?php

namespace Marat555\Eventbrite\Factories\Api;

use Marat555\Eventbrite\Factories\Entity\User as UserEntity;
use Marat555\Eventbrite\Contracts\Api\User as UserInterface;

/**
 * Eventbrite API wrapper for Laravel
 *
 * @package  Eventbrite
 * @author   @marat555
 */
class User extends AbstractApi implements UserInterface
{

    /**
     * The class of the entity we are working with
     *
     * @var UserEntity
     */
    protected $class = UserEntity::class;

    /**
     * The Eventbrite API endpoint of the resource type.
     *
     * @var string
     */
    protected $endpoint = "users";

    /**
     * {@inheritdoc}
     */
    public function me()
    {
        // Prep the endpoint
        $endpoint = $this->getEndpoint() . "/me";

        // Get the resource
        $response = $this->client->get($endpoint, $this->prepareParams());

        // Handle response
        return $this->handleResponse(json_decode($response));
    }
}
