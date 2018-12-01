<?php

namespace Marat555\Eventbrite\Factories\Entity;

class Event extends AbstractEntity
{

    /**
     * Event name
     *
     * @var string
     */
    public $name;

    /**
     * (Optional) Event description. Description can be lengthy and have significant formatting
     *
     * @var string
     */
    public $description;

    /**
     * URL of the Event's Listing page on eventbrite.com
     *
     * @var string
     */
    public $url;

    /**
     * Event start date and time
     *
     * @var string
     */
    public $start;

    /**
     * Event end date and time
     *
     * @var string
     */
    public $end;

    /**
     * Event creation date and time
     *
     * @var string
     */
    public $created;

    /**
     * Date and time of most recent changes to the Event
     *
     * @var string
     */
    public $changed;

    /**
     * Event status. Can be draft, live, started, ended, completed, canceled
     *
     * @var string
     */
    public $status;

    /**
     * Event ISO 4217 currency code
     *
     * @var string
     */
    public $currency;

    /**
     * true = Specifies that the Event is online only (i.e. the Event does not have a Venue)
     *
     * @var boolean
     */
    public $online_event;

    /**
     * true = Allows the Event to be publicly searchable on the Eventbrite website
     *
     * @var boolean
     */
    public $listed;

    /**
     * true = Event is shareable, by including social sharing buttons for the Event to Eventbrite applications
     *
     * @var boolean
     */
    public $shareable;

    /**
     * true = Only invitees who have received an email inviting them to the Event are able to see Eventbrite applications
     *
     * @var boolean
     */
    public $invite_only;

    /**
     * true = Provides, to Eventbrite applications, the total number of remaining tickets for the Event
     *
     * @var boolean
     */
    public $show_remaining;

    /**
     * Event password used by visitors to access the details of the Event
     *
     * @var string
     */
    public $password;

    /**
     * Maximum number of tickets for the Event that can be sold to Attendees.
     * The total capacity is calculated by the sum of the quantity_total of the Ticket Class
     *
     * @var integer
     */
    public $capacity;

    /**
     * true = Use custom capacity value to specify the maximum number of Attendees for the Event.
     * False = Calculate the maximum number of Attendees for the Event from the total of all Ticket Class capacities
     *
     * @var boolean
     */
    public $capacity_is_custom;
}
