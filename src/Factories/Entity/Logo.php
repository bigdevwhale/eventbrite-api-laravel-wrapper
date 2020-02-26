<?php

namespace Marat555\Eventbrite\Factories\Entity;


class Logo extends AbstractEntity
{
    /**
     * The image’s ID
     *
     * @var string
     */
    public $id;

    /**
     * The URL of the image
     *
     * @var string
     */
    public $url;

    /**
     * The URL of the image
     *
     * @var string
     */
    public $aspectRatio;

    /**
     * The original image data
     *
     * @var string
     */
    public $original;

    /**
     * The crop mask of the image
     *
     * @var string
     */
    public $cropMask;
}