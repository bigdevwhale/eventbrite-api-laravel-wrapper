<?php

namespace Benmag\Rancher\Factories\Api;
use Marat555\Eventbrite\Factories\Client;


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
     * Optional scope to apply
     *
     * @var string
     */
    protected $scope;

    /**
     * Additional fields for entity to make available
     *
     * @var array
     */
    protected $fields = [];

    /**
     * Additional endpoints to load with this request
     *
     * @var array
     */
    protected $with = [];

    /**
     * Filters to apply to this request
     *
     * @var array
     */
    protected $filter = [];

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
        // Get all objects from Rancher API
        $objects = $this->client->get($this->getEndpoint(), $this->prepareParams());

        // Decode the json response
        $objects = json_decode($objects);

        // Convert to entityClass
        return array_map(function ($object) {
            return $this->instantiateEntity($object);
        }, $objects->data);

    }

    /**
     * Get a specified Entity from the API resource.
     *
     * @param null $id
     * @return mixed
     * @throws \Exception
     */
    public function get($id = null)
    {

        // Prep the endpoint
        $endpoint = ($id) ? $this->getEndpoint() . "/" . $id : $this->getEndpoint();

        // Get the resource
        $response = $this->client->get($endpoint, $this->prepareParams());

        // Handle response
        return $this->handleResponse(json_decode($response));

    }

    /**
     * Define additional fields for entity to dynamically expose.
     *
     * Use this to enable access properties that are
     * not explicitly defined by the entity
     *
     * @var array
     * @return $this
     */
    public function fields($fields)
    {
        $this->fields = array_merge($this->fields, $fields);
        return $this;
    }

    /**
     * Define the endpoints to load
     *
     * @var array
     * @return $this
     */
    public function with($relations)
    {
        $this->with = $relations;
        $this->fields = array_merge($this->fields, $this->with);
        return $this;
    }

    /**
     * Apply a filter to apply on request
     *
     * @param $filter
     * @return mixed
     */
    public function filter($filter)
    {
        $this->filter = $filter;
        return $this;
    }

    /**
     * Prepare the params for the request
     *
     * @return array
     */
    public function prepareParams()
    {
        return array_merge(
            ['include' => $this->with],
            $this->filter
        );
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
    public function handleResponse($response) {

        // No filter has been applied to this request.
        // Standard request, instantiate a single object.
        if(empty($this->filter)) {
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

        // Modify params so the class builder knows what was included via with()
        $params->_with = $this->with;

        $params->_fields = $this->fields;

        // Instantiate new entity class
        return new $this->class($params);

    }

    /**
     * By default Rancher's scope is the default
     * Project the credentials have access too.
     *
     * Use this method to set the scope.
     */
    public function scope($projectId)
    {
        $this->scope = "projects/" . $projectId . "/";
        return $this;
    }

    /**
     * An alias of the scope method
     */
    public function project($projectId)
    {
        return $this->scope($projectId);
    }

    /**
     * Get the API endpoint
     *
     * @return string
     */
    public function getEndpoint()
    {
        return $this->scope . $this->endpoint;
    }

}