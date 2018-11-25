<?php

namespace Marat555\Eventbrite\Contracts\Api;

/**
 * An object representing a single webhook associated with the account.
 *
 * @package  Eventbrite
 * @author   @marat555
 */
interface Webhook
{
    
    /**
     * {@inheritdoc}
     */
    public function all();

    /**
     * {@inheritdoc}
     */
    public function get($id);

    /**
     * Send create request to API
     *
     * @param \Marat555\Eventbrite\Factories\Entity\Webhook $webhook
     * @return \Marat555\Eventbrite\Factories\Entity\Webhook
     */
    public function create(\Marat555\Eventbrite\Factories\Entity\Webhook $webhook);

    /**
     * Delete a webhook
     *
     * @param $id
     * @return \Marat555\Eventbrite\Factories\Entity\Webhook
     */
    public function delete($id);
}
