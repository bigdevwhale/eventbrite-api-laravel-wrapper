<?php
/**
 * Created by PhpStorm.
 * User: josephmurphy
 * Date: 2/13/20
 * Time: 10:27 PM
 */

namespace Marat555\Eventbrite\Factories\Entity;


class TicketAvailability extends AbstractEntity
{
//{"has_available_tickets":true,"minimum_ticket_price":{"currency":"USD","value":2000,"major_value":"20.00","display":"20.00 USD"},"maximum_ticket_price":{"currency":"USD","value":2000,"major_value":"20.00","display":"20.00 USD"},"is_sold_out":false,"start_sales_date":{"timezone":"America\/Chicago","local":"2020-01-10T10:00:00","utc":"2020-01-10T16:00:00Z"},"waitlist_available":false}

    public $hasAvailableTickets;
    public $waitlistAvailable;
    public $isSoldOut;
    public $minimumTicketPrice;
    public $maxiumTicketPrice;
    public $startSalesDate;
}