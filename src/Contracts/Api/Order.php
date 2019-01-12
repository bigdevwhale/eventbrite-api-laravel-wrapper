<?php

namespace Marat555\Eventbrite\Contracts\Api;

use Marat555\Eventbrite\Factories\Entity\Event as EventEntity;
use Marat555\Eventbrite\Factories\HelperEntity\ObjectList;

/**
 * The Order object represents an order made against Eventbrite for one or more Ticket Classes. In other words,
 * a single Order can be made up of multiple tickets. The object contains an Order's financial and
 * transactional information; use the Attendee object to return information on Attendees.Order objects are
 * considered private; meaning that all Order information is only available to the Eventbrite User and Order owner.
 *
 * @package  Eventbrite
 * @author   @marat555
 */
interface Order
{
    /**
     * {@inheritdoc}
     */
    public function get($id);

    /**
     * List of orders by UserID|OrganizationID|EventID
     *
     * @param string $by - 'user'|'organization'|'event'
     * @param int $id
     * @param array $filterParams
     * @return ObjectList
     */
    public function list(string $by, int $id, array $filterParams = []);

    /**
     * Find and return an Organization's Orders with the given $filterParams
     *
     * @param int $organizationId
     * @param array $filterParams
     * @return ObjectList
     */
    public function search(int $organizationId, array $filterParams = []);
}
