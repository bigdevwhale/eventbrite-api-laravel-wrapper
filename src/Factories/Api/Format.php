<?php

namespace Marat555\Eventbrite\Factories\Api;

use Marat555\Eventbrite\Factories\Entity\Format as FormatEntity;
use Marat555\Eventbrite\Contracts\Api\Format as FormatInterface;
use Marat555\Eventbrite\Factories\HelperEntity\FormatList;
use Marat555\Eventbrite\Factories\HelperEntity\ObjectList;
use Marat555\Eventbrite\Factories\HelperEntity\Pagination;

/**
 * Eventbrite API wrapper for Laravel
 *
 * @package  Eventbrite
 * @author   @marat555
 */
class Format extends AbstractApi implements FormatInterface
{

    /**
     * The class of the entity we are working with
     *
     * @var FormatEntity
     */
    protected $class = FormatEntity::class;

    /**
     * The Eventbrite API endpoint of the resource type.
     *
     * @var string
     */
    protected $endpoint = "formats";

    /**
     * @var string
     */
    protected $locale = "locale";

    /**
     * {@inheritdoc}
     * @throws \Exception
     */
    public function list()
    {
        $objects = null;
        $locale = null;

        $response = $this->client->get($this->endpoint);
        $response = json_decode($response);

        if (property_exists($response, "$this->endpoint")) {
            $objects = array_map(function ($object) {
                return $this->instantiateEntity($object);
            }, $response->{$this->endpoint});
        }

        if (property_exists($response, $this->locale)) {
            $locale = $response->{$this->locale};
        }

        return new FormatList($locale, $objects);
    }
}
