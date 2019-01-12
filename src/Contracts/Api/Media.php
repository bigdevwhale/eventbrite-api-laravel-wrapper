<?php

namespace Marat555\Eventbrite\Contracts\Api;

use Marat555\Eventbrite\Factories\Entity\DisplaySettings as DisplaySettingsEntity;
use Marat555\Eventbrite\Factories\Entity\MediaUploadType;
use Marat555\Eventbrite\Factories\HelperEntity\ObjectList;

/**
 * Media api interface
 *
 * @package  Eventbrite
 * @author   @marat555
 */
interface Media
{
    /**
     * Send update request to API
     *
     * @param int $eventId
     * @param array $displaySettings
     * @return DisplaySettingsEntity
     */
    public function update(int $eventId, array $displaySettings);

    /**
     * Create a Media Upload
     *
     * @param array $params
     * @return mixed
     */
    public function createUpload(array $params);

    /**
     * Retrieve a Media Upload
     *
     * @param array $params
     * @return MediaUploadType
     */
    public function retrieveUpload(array $params);
}
