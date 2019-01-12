<?php

namespace Marat555\Eventbrite\Factories\Entity;

class DisplaySettings extends AbstractEntity
{

    /**
     * Whether to display the start date on the event listing
     *
     * @var boolean
     */
    public $showStartDate;

    /**
     * Whether to display the end date on the event listing
     *
     * @var boolean
     */
    public $showEndDate;

    /**
     * Whether to display event start and end time on the event listing
     *
     * @var boolean
     */
    public $showStartEndTime;

    /**
     * Whether to display the event timezone on the event listing
     *
     * @var boolean
     */
    public $showTimezone;

    /**
     * Whether to display a map to the venue on the event listing
     *
     * @var boolean
     */
    public $showMap;

    /**
     * Whether to display the number of remaining tickets
     *
     * @var boolean
     */
    public $showRemaining;

    /**
     * Whether to display a link to the organizer’s Facebook profile
     *
     * @var boolean
     */
    public $showOrganizerFacebook;

    /**
     * Whether to display a link to the organizer’s Twitter profile
     *
     * @var boolean
     */
    public $showOrganizerTwitter;

    /**
     * Whether to display which of the user’s Facebook friends are going
     *
     * @var boolean
     */
    public $showFacebookFriendsGoing;

    /**
     * Which terminology should be used to refer to the event (tickets_vertical || endurance_vertical)
     *
     * @var string
     */
    public $terminology;
}
