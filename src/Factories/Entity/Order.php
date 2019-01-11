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

}
