<?php

namespace Marat555\Eventbrite\Factories\Entity;

class MediaUpload extends AbstractEntity
{

    /**
     * The upload_token from the GET portion of the upload
     *
     * @var string
     */
    public $uploadToken;

    /**
     * A crop mask defines the window that will be used to crop the uploaded media
     *
     * @var CropMask
     */
    public $cropMask;
}
