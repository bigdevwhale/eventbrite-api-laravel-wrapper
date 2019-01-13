<?php

namespace Marat555\Eventbrite\Contracts\Api;

use Marat555\Eventbrite\Factories\Entity\DisplaySettings as DisplaySettingsEntity;
use Marat555\Eventbrite\Factories\HelperEntity\ObjectList;

/**
 * The front-end display settings for an Event.
 *
 * @package  Eventbrite
 * @author   @marat555
 */
interface DisplaySettings
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
     * {@inheritdoc}
     */
    public function get(int $eventId);
}
