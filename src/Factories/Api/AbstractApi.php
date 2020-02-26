<?php

namespace Marat555\Eventbrite\Factories\Api;

use Marat555\Eventbrite\Factories\Client;
use Marat555\Eventbrite\Factories\HelperEntity\ObjectList;
use Marat555\Eventbrite\Factories\HelperEntity\Pagination;

/**
 * Eventbrite API wrapper for Laravel
 *
 * @package  Eventbrite
 * @author   @marat555
 */
abstract class AbstractApi
{

    /**
     * Client object
     *
     * @var Client
     */
    protected $client;

    /**
     * Class of the entity.
     *
     * @var string
     */
    protected $class;

    /**
     * The API endpoint for the entity
     *
     * @var string
     */
    protected $endpoint;

    /**
     * Pagination property name
     *
     * @var string
     */
    protected $pagination = "pagination";

    /**
     * Information from expansions fields are not normally returned when requesting information.
     * To receive this information in a request, expand the request
     *
     * @var array
     */
    protected $expansion = [];

    /**
     * Inject API Client
     *
     * @param Client $client
     */
    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    /**
     * Get all of the Entities for the API resource.
     *
     * @return mixed
     * @throws \Exception
     */
    public function all()
    {
        $objects = null;
        $pagination = null;
        $response = $this->client->get($this->getEndpoint(), $this->prepareParams());
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
     * Get a specified Entity from the API resource.
     *
     * @param $id
     * @return mixed
     */
    public function get($id)
    {
        // Prep the endpoint
        $endpoint = $this->getEndpoint() . "/" . $id;

        // Get the resource
        $response = $this->client->get($endpoint, $this->prepareParams());

        // Handle response
        return $this->handleResponse(json_decode($response));
    }

    /**
     * Update a specified Entity from the API resource.
     *
     * @param int $id
     * @param array $entity
     * @return mixed
     * @throws \Exception
     */
    public function update(int $id, array $entity)
    {
        $entityNamespaceArray = explode('\\', $this->class);
        $data[strtolower(end($entityNamespaceArray))] = $entity;

        // Prep the endpoint
        $endpoint = $this->getEndpoint() . '/' . $id;

        // Get the resource
        $response = $this->client->post($endpoint, $data, ['content_type' => 'json']);

        // Handle response
        return $this->handleResponse(json_decode($response));
    }

    /**
     * Delete a specified Entity from the API resource
     *
     * @param $id
     * @return boolean
     * @throws \Exception
     */
    public function delete(int $id)
    {
        // Prep the endpoint
        $endpoint = $this->getEndpoint() . "/" . $id;

        // Send "delete" request
        $response = $this->client->delete($endpoint, null, ['content_type' => 'json']);

        // Parse response
        $response = json_decode($response, true);

        return isset($response['deleted']) ? $response['deleted'] : false;
    }

    /**
     * Add expansion to request
     *
     * @param $expansion
     * @return mixed
     */
    public function expand(string $expansion)
    {
        $this->expansion = $expansion;
        return $this;
    }

    /**
     * Prepare the params for the request
     *
     * @return array
     */
    public function prepareParams()
    {
        return ['expand' => $this->expansion];
    }

    /**
     * Handle API response.
     *
     * When a filter has been applied, we must handle
     * the response differently.
     *
     * @param $response
     * @return array
     */
    public function handleResponse($response)
    {

        // No filter has been applied to this request.
        // Standard request, instantiate a single object.
        if (empty($this->filter)) {
            return $this->instantiateEntity($response);
        }

        // Filter applied.
        // Instantiate an object for each result returned.
        else {
            return array_map(function ($object) {
                return $this->instantiateEntity($object);
            }, $response->data);
        }
    }

    /**
     * Instantiate a new entityClass
     *
     * @param $params
     * @return mixed
     */
    public function instantiateEntity($params)
    {
        return new $this->class($params);
    }

    /**
     * Get the API endpoint
     *
     * @return string
     */
    public function getEndpoint()
    {
        return $this->endpoint;
    }
}
