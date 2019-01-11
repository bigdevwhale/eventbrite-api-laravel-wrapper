<?php

namespace Marat555\Eventbrite\Factories\Entity;

class Attendee extends AbstractEntity
{

    /**
     * Attendee ID
     *
     * @var string
     */
    public $id;

    /**
     * When the attendee was created (order placed)
     *
     * @var number
     */
    public $created;

    /**
     * When the attendee was last changed
     *
     * @var string
     */
    public $changed;

    /**
     * The ticketClass that the attendee registered with
     *
     * @var string
     */
    public $ticketClassId;

    /**
     * The name of the ticket_class at the time of registration
     *
     * @var string
     */
    public $ticketClassName;

    /**
     * The attendee's basic profile information
     *
     * @var string
     */
    public $profile;
}
