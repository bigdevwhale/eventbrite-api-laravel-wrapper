<?php

namespace Marat555\Eventbrite\Factories\Entity;

class CropMask extends AbstractEntity
{

    /**
     * The upload_token from the GET portion of the upload
     *
     * @var string
     */
    public $uploadToken;

    /**
     * Coordinate for top-left corner of crop mask
     *
     * @var TopLeft
     */
    public $topLeft;

    /**
     * Crop mask width
     *
     * @var number
     */
    public $width;

    /**
     * Crop mask height
     *
     * @var number
     */
    public $height;
}
