<?php

namespace Marat555\Eventbrite\Factories\Entity;

class Profile extends AbstractEntity
{

    /**
     * The attendee's name. Use this in preference to first_name/last_name/etc.
     * if possible for forward compatibility with non-Western names.
     *
     * @var string
     */
    public $name;

    /**
     * The attendee's email address
     *
     * @var string
     */
    public $email;

    /**
     * The attendee's first name
     *
     * @var string
     */
    public $firstName;

    /**
     * The attendee's last name
     *
     * @var string
     */
    public $firstLast;

    /**
     * The title or honoraria used in front of the name (Mr., Mrs., etc.)
     *
     * @var string
     */
    public $prefix;

    /**
     * The suffix at the end of the name (e.g. Jr, Sr)
     *
     * @var string
     */
    public $suffix;

    /**
     * The attendee's age
     *
     * @var string
     */
    public $jobTitle;

    /**
     * The attendee's company name
     *
     * @var string
     */
    public $company;

    /**
     * The attendee's website address
     *
     * @var string
     */
    public $website;

    /**
     * The attendee's blog address
     *
     * @var string
     */
    public $blog;

    /**
     * The attendee's gender [male || female]
     *
     * @var string
     */
    public $gender;

    /**
     * The attendee's birth date
     *
     * @var string
     */
    public $birthDate;

    /**
     * The attendee's cell/mobile phone number, as formatted by them
     *
     * @var string
     */
    public $cellPhone;

    /**
     * The attendee's cell/mobile work phone number, as formatted by them
     *
     * @var string
     */
    public $workPhone;

    /**
     * The attendee's basic profile information
     *
     * @var Addresses
     */
    public $addresses;
}
