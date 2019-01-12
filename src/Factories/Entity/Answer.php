<?php

namespace Marat555\Eventbrite\Factories\Entity;

/**
 * Class Answer
 *
 * @package Marat555\Eventbrite\Factories\Entity
 */
class Answer extends AbstractEntity
{

    /**
     * The ID of the custom question
     *
     * @var string
     */
    public $questionId;

    /**
     * The ID of the attendee
     *
     * @var string
     */
    public $attendeeId;

    /**
     * The text of the custom question
     *
     * @var array
     */
    public $string;

    /**
     * One of text, url, email, date, number, address, or dropdown
     *
     * @var array
     */
    public $type;

    /**
     * Type varies based on the question type. Most types have a string answer,
     * except for the following with object answers
     *
     * @var string
     */
    public $answer;
}
