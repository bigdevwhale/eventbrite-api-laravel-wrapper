<?php

namespace Marat555\Eventbrite\Factories\Entity;

class Order extends AbstractEntity
{
    /**
     * The ID of the order
     *
     * @var string
     */
    public $id;

    /**
     * When the attendee was created (order placed)
     *
     * @var string
     */
    public $created;

    /**
     * When the attendee was last changed
     *
     * @var string
     */
    public $changed;

    /**
     * The ticket buyer’s name. Use this in preference to first_name/last_name if possible for forward compatibility with non-Western names.
     *
     * @var string
     */
    public $name;

    /**
     * The ticket buyer’s first name
     *
     * @var string
     */
    public $firstName;

    /**
     * The ticket buyer’s last name
     *
     * @var string
     */
    public $lastName;

    /**
     * The ticket buyer’s email address
     *
     * @var string
     */
    public $email;

    /**
     * Cost breakdown for this order
     *
     * @var Costs
     */
    public $costs;

    /**
     * The event id this order is against
     *
     * @var string
     */
    public $eventId;

    /**
     * Full details of the event (requires the event expansion)
     *
     * @var Event
     */
    public $event;

    /**
     * The list of attendees that belong to this order (requires the attendees expansion)
     *
     * @var Attendee[]
     */
    public $attendees;

    /**
     * Is an absolute URL to the API endpoint that will return you the canonical representation of the order.
     *
     * @var string
     */
    public $resourceUri;

    /**
     * The status of the order
     *
     * @var string
     */
    public $status;
}
