<?php

namespace Marat555\Eventbrite\Factories\Entity;

class AssignedUnit extends AbstractEntity
{

    /**
     * The seating assignment's ID. This value can never be null
     *
     * @var object
     */
    public $unitId;

    /**
     * Detailed description for the seating assignment. This is calculated from title and strings of
     * this seating assignment. This value can never be null
     *
     * @var string
     */
    public $description;

    /**
     * This seat assignment's physical location on the seatmap. This value is null or omitted if seatmap is not published
     * for this event. "Pin" ("My seat is here") for a given seat assignment can be displayed using this seat location image info.
     * For a given order with multiple attendees, all seat assignments are usually placed on the same seatmap image.
     * In case different seatmap images are used within the same order, only those locations with the identical image url
     * should be displayed on the same image. Even when there are many assigned seats within very small part of image,
     * we recommend placing “pin” for each seat. Alternatively, x-y coordinates can be compared to place a single pin for
     * seats that are close together.
     *
     * @var LocationImage
     */
    public $locationImage;

    /**
     * List of label strings of this seating assignment. This value can never be null
     *
     * @var array
     */
    public $labels;

    /**
     * List of title strings of this seating assignment. This value can never be null. Number of titles are always equal
     * or more than number of labels. If seat locations are displayed in the grid view, api client is expected to group
     * assigned locations by titles and use a separate grid for each unique titles
     *
     * @var array
     */
    public $titles;
}
