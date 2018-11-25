<?php

namespace Marat555\Eventbrite\Factories\Entity;

class Webhook extends AbstractEntity
{

    /**
     * The uri of the individual webhook
     *
     * @var string
     */
    public $resourceUri;

    /**
     * The url that the webhook will send data to when it is triggered
     *
     * @var string
     */
    public $endpointUrl;

    /**
     * One or any combination of actions that will cause this webhook to fire
     *
     * @var string
     */
    public $actions;
}
