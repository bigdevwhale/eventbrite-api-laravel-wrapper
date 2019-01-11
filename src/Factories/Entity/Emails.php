<?php

namespace Marat555\Eventbrite\Factories\Entity;

class Emails extends AbstractEntity
{

    /**
     * Email
     *
     * @var string
     */
    public $email;

    /**
     * Verified?
     *
     * @var boolean
     */
    public $verified;

    /**
     * Primary?
     *
     * @var boolean
     */
    public $primary;
}
