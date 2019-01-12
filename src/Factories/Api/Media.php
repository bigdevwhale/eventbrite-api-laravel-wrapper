<?php

namespace Marat555\Eventbrite\Factories\Api;

use Marat555\Eventbrite\Factories\Entity\Media as MediaEntity;
use Marat555\Eventbrite\Contracts\Api\Media as MediaInterface;
use Marat555\Eventbrite\Factories\Entity\MediaUpload;
use Marat555\Eventbrite\Factories\Entity\MediaUploadType;

/**
 * Eventbrite API wrapper for Laravel
 *
 * @package  Eventbrite
 * @author   @marat555
 */
class Media extends AbstractApi implements MediaInterface
{
    /**
     * The class of the entity we are working with
     *
     * @var MediaEntity
     */
    protected $class = MediaEntity::class;

    /**
     * The Eventbrite API endpoint of the resource type.
     *
     * @var string
     */
    protected $endpoint = "media";

    /**
     * {@inheritdoc}
     * @throws \Exception
     */
    public function createUpload(array $params)
    {
        // Prep the endpoint
        $endpoint = $this->getEndpoint() . '/upload';

        // Send "upload" request
        $response = $this->client->post($endpoint, $params, ['content_type' => 'json']);

        // Parse response
        $response = json_decode($response);

        return new MediaUpload($response);
    }

    /**
     * {@inheritdoc}
     * @throws \Exception
     */
    public function retrieveUpload(array $params)
    {
        // Prep the endpoint
        $endpoint = $this->getEndpoint() . '/upload';

        // Send "upload" request
        $response = $this->client->get($endpoint, $params, ['content_type' => 'json']);

        // Parse response
        $response = json_decode($response);

        return new MediaUploadType($response);
    }
}
