<?php

namespace Marat555\Eventbrite\Factories\Entity;


class TicketAvailability extends AbstractEntity
{
    /**
     * Event flag for ticket availability
     *
     * @var string
     */
    public $hasAvailableTickets;

    /**
     * Event flag to determine wait list availability
     *
     * @var string
     */
    public $waitlistAvailable;

    /**
     * Event flag for sold out events
     *
     * @var string
     */
    public $isSoldOut;

    /**
     * Events minimum ticket price
     *
     * @var string
     */
    public $minimumTicketPrice;

    /**
     * Events maxium ticket price
     *
     * @var string
     */
    public $maxiumTicketPrice;

    /**
     * Start date of the sales of the tickets for the event
     *
     * @var string
     */
    public $startSalesDate;
}