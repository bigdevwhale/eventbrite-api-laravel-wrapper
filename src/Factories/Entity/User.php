<?php

namespace Marat555\Eventbrite\Factories\Entity;

class User extends AbstractEntity
{

    /**
     * Full name. Use this in preference to first_name/last_name if possible for forward compatibility with non-Western names.
     *
     * @var string
     */
    public $name;

    /**
     * First name
     *
     * @var string
     */
    public $firstName;

    /**
     * Last name
     *
     * @var string
     */
    public $lastName;

    /**
     * Is this user's profile public?
     *
     * @var string
     */
    public $isPublic;

    /**
     * The organization image id
     *
     * @var string
     */
    public $imageId;

    /**
     * List of User Email objects
     *
     * @var string
     */
    public $emails;
}
