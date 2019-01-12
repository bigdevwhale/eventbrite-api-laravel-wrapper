<?php

namespace Marat555\Eventbrite\Factories\Entity;

class Question extends AbstractEntity
{

    /**
     * @var string
     */
    public $resourceUri;

    /**
     * @var string
     */
    public $id;

    /**
     * @var object
     */
    public $question;

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
