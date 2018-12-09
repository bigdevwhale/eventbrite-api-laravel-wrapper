<?php

namespace Marat555\Eventbrite\Factories\Entity;

/**
 * Class Event
 * @package Marat555\Eventbrite\Factories\Entity
 *
 *
 */
class Event extends AbstractEntity
{
    /**
     * Event ID
     *
     * @var string
     */
    public $id;

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
     * The vanity URL to the event page for this event on Eventbrite
     *
     * @var string
     */
    public $vanity_url;

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
    public $onlineEvent;

    /**
     * ID of the event organizer
     *
     * @var string
     */
    public $organizerId;

    /**
     * Organization owning the event
     *
     * @var string
     */
    public $organizationId;

    /**
     * Image ID of the event logo
     *
     * @var string
     */
    public $logoId;

    /**
     * Event venue ID
     *
     * @var string
     */
    public $venueId;

    /**
     * Event format (Expansion: format)
     *
     * @var string
     */
    public $formatId;

    /**
     * Event category (Expansion: category)
     *
     * @var string
     */
    public $categoryId;

    /**
     * Event subcategory (Expansion: subcategory)
     *
     * @var string
     */
    public $subcategoryId;

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
    public $inviteOnly;

    /**
     * true = Provides, to Eventbrite applications, the total number of remaining tickets for the Event
     *
     * @var boolean
     */
    public $showRemaining;

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
    public $capacityIsCustom;

    /**
     * Maximum duration (in seconds) of a transaction
     *
     * @var string
     */
    public $txTimeLimit;

    /**
     * Shows when event starts
     *
     * @var boolean
     */
    public $hideStartDate;

    /**
     * Hide when event starts
     *
     * @var boolean
     */
    public $hideEndDate;

    /**
     * The event Locale
     *
     * @var string
     */
    public $locale;

    /**
     * @var boolean
     */
    public $isLocked;

    /**
     * @var boolean
     */
    public $privacySetting;

    /**
     * @var boolean
     */
    public $isSeries;

    /**
     * @var boolean
     */
    public $isSeriesParent;

    /**
     * Enables to show pick a seat option
     *
     * @var boolean
     */
    public $showPickASeat;

    /**
     * If the events has been set to have reserved seatings
     *
     * @var boolean
     */
    public $isReservedSeating;

    /**
     * Enables to show seatmap thumbnail
     *
     * @var boolean
     */
    public $showSeatmapThumbnail;

    /**
     * For reserved seating event, if venue map thumbnail should have colors on the event page
     *
     * @var boolean
     */
    public $showColorsInSeatmapThumbnail;

    /**
     * Allows to set a free event
     *
     * @var boolean
     */
    public $isFree;

    /**
     * Source of the event (defaults to API)
     *
     * @var string
     */
    public $source;

    /**
     * @var string
     */
    public $version;

    /**
     * @var string
     */
    public $resourceUri;
}
