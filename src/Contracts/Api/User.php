<?php

namespace Marat555\Eventbrite\Contracts\Api;

use Marat555\Eventbrite\Factories\Entity\User as UserEntity;

/**
 * User is an object representing an Eventbrite account. Users are Members of an Organization.
 *
 * @package  Eventbrite
 * @author   @marat555
 */
interface User
{
    /**
     * {@inheritdoc}
     */
    public function get($id);

    /**
     * Retrieve your User
     *
     * @return UserEntity
     */
    public function me();
}
