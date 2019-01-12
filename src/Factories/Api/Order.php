<?php

namespace Marat555\Eventbrite\Factories\Api;

use Marat555\Eventbrite\Factories\Entity\Order as OrderEntity;
use Marat555\Eventbrite\Contracts\Api\Order as OrderInterface;
use Marat555\Eventbrite\Factories\HelperEntity\Pagination;
use Marat555\Eventbrite\Factories\HelperEntity\ObjectList;

/**
 * Eventbrite API wrapper for Laravel
 *
 * @package  Eventbrite
 * @author   @marat555
 */
class Order extends AbstractApi implements OrderInterface
{
    /**
     * List path contants
     */
    const ORGANIZATIONS = "organizations";
    const USERS = "users";
    const EVENTS = "events";

    /**
     * The class of the entity we are working with
     *
     * @var OrderEntity
     */
    protected $class = OrderEntity::class;

    /**
     * The Eventbrite API endpoint of the resource type.
     *
     * @var string
     */
    protected $endpoint = "orders";

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
    public function search(int $organizationId, array $filterParams = [])
    {
        $objects = null;
        $pagination = null;

        // Prep the endpoint
        $endpoint = self::ORGANIZATIONS . "/$organizationId/$this->endpoint/search";

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
