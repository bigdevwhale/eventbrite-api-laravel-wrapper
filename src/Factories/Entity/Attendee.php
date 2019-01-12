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
     * @var Profile
     */
    public $profile;

    /**
     * The per-attendee custom questions
     *
     * @var Question[]
     */
    public $questions;

    /**
     * The attendee’s answers to any custom questions
     *
     * @var Answer[]
     */
    public $answers;

    /**
     * The attendee’s entry barcode information
     *
     * @var Barcode[]
     */
    public $barcodes;

    /**
     * The attendee’s team information
     *
     * @var Team
     */
    public $team;

    /**
     * The attendee's affiliate code
     *
     * @var string
     */
    public $affiliate;

    /**
     * If the attendee is checked in
     *
     * @var boolean
     */
    public $checkedIn;

    /**
     * If the attendee is cancelled
     *
     * @var boolean
     */
    public $cancelled;

    /**
     * If the attendee is refunded
     *
     * @var boolean
     */
    public $refunded;

    /**
     * Cost breakdown for this attendee
     *
     * @var Costs
     */
    public $costs;

    /**
     * The status of the attendee (scheduled to be deprecated)
     *
     * @var string
     */
    public $status;

    /**
     * The event id that this attendee is attending
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
     * The order id this attendee is part of
     *
     * @var string
     */
    public $orderId;

    /**
     * Full details of the order (requires the order expansion)
     *
     * @var Order
     */
    public $order;

    /**
     * The guestlist id for this attendee. If this is null it means that this is not a guest
     *
     * @var string
     */
    public $guestlistId;

    /**
     * The name of the person that invited the attendee. If this is null it means that this is not a guest
     *
     * @var string
     */
    public $invitedBy;

    /**
     * The attendee’s seating assignment details if reserved seating. This can be null or omitted if no specific seating
     * is assigned to this attendee. (requires the assigned_unit expansion)
     *
     * @var AssignedUnit
     */
    public $assignedUnit;

    /**
     * The method of delivery that is to be used for the attendee. This can be null.
     *
     * @var string
     */
    public $deliveryMethod;

    /**
     * A composite id with the format T12345-D12345 where the T12345 is the ticket_class id and
     * D12345 is the discount id applied to this attendee
     *
     * @var string
     */
    public $variantId;

    /**
     * The resource URI
     *
     * @var string
     */
    public $resourceUri;
}
