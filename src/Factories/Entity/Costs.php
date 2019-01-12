<?php

namespace Marat555\Eventbrite\Factories\Entity;

class Costs extends AbstractEntity
{

    /**
     * The base price without fees and taxes
     *
     * @var Cost
     */
    public $basePrice;

    /**
     * The total amount the buyer was charged
     *
     * @var Cost
     */
    public $gross;

    /**
     * The portion of gross taken by Eventbrite as a management fee
     *
     * @var Cost
     */
    public $eventbriteFee;

    /**
     * The portion of gross taken by the payment processor
     *
     * @var Cost
     */
    public $paymentFee;

    /**
     * The portion of gross allocated for tax (but passed onto the organizer)
     *
     * @var Cost
     */
    public $tax;
}
