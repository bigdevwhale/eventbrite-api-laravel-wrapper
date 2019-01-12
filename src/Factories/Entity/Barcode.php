<?php

namespace Marat555\Eventbrite\Factories\Entity;

class Barcode extends AbstractEntity
{

    /**
     * The barcode contents. Note that when viewed by the attendee, if the event organizer has turned off printable tickets,
     * or if the organizer has method of delivery and the attendee method of delivery is not electronic, this field will be
     * null in order to prevent exposing the barcode value. When viewed by the organizer with event.orders:read permission,
     * the barcode will always be provided
     *
     * @var string
     */
    public $barcode;

    /**
     * When the attendee barcode was created
     *
     * @var string
     */
    public $created;

    /**
     * When the attendee barcode was changed
     *
     * @var string
     */
    public $changed;

    /**
     * The method used to validate the attendee barcode
     *
     * @var string
     */
    public $checkinType;

    /**
     * True if ticket has been printed
     *
     * @var boolean
     */
    public $isPrinted;

    /**
     * @var string
     */
    public $type;

    /**
     * @var boolean
     */
    public $required;

    /**
     * @var Choice[]
     */
    public $choices;

    /**
     * @var array
     */
    public $ticketClasses;

    /**
     * @var string
     */
    public $respondent;
}
