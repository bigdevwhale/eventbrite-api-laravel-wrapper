<?php

namespace Marat555\Eventbrite\Factories\Entity;

class LocationImage extends AbstractEntity
{

    /**
     * fully qualified url of the seatmap image. Currently all seatmap images are in 660x660 .png format. This value can never be null.
     *
     * @var string
     */
    public $url;

    /**
     * x coordinate of this seat's location within this seatmap measured in % from the top edge of seatmap.
     * The value ranges from 0.0 between 100.0. This value can never be null.
     *
     * @var string
     */
    public $x;

    /**
     * y coordinate of this seat's location within this seatmap measured in % from the left edge of seatmap.
     * The value ranges from 0.0 between 100.0. This value can never be null.
     *
     * @var number
     */
    public $y;
}
