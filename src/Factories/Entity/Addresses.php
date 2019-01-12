<?php

namespace Marat555\Eventbrite\Factories\Entity;

class Addresses extends AbstractEntity
{

    /**
     * @var Address
     */
    public $home;

    /**
     * @var Address
     */
    public $ship;

    /**
     * @var Address
     */
    public $work;

    /**
     * @var Address
     */
    public $bill;
}
