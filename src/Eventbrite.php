<?php

namespace Matat555\Youtube;

class Eventbrite
{
    /**
     * @var string
     */
    protected $eventbriteToken; // from the config file

    /**
     * @var string
     */
    protected $eventbriteClientSecret; // from the config file

    /**
     * Constructor
     * $eventbrite = new Eventbrite(['token' => 'TOKEN HERE', 'secret' => 'CLIENT SECRET HERE'])
     *
     * @param string $token
     * @param $secret
     * @throws \Exception
     */
    public function __construct($token, $secret)
    {
        if (is_string($token) && !empty($token) && is_string($secret) && !empty($secret)) {
            $this->eventbriteToken = $token;
            $this->eventbriteClientSecret = $secret;
        } else {
            throw new \Exception('Eventbrite token and client secret are required, please visit https://www.eventbrite.com/developer/v3/api_overview/authentication/');
        }
    }


}