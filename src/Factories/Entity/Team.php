<?php

namespace Marat555\Eventbrite\Factories\Entity;

class Team extends AbstractEntity
{

    /**
     * The team's name
     *
     * @var string
     */
    public $name;

    /**
     * The team's ID
     *
     * @var string
     */
    public $id;

    /**
     * When the attendee joined the team
     *
     * @var string
     */
    public $dataJoined;

    /**
     * The event the team is part of
     *
     * @var string
     */
    public $eventId;
}
