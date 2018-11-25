<?php

namespace Marat555\Eventbrite\Contracts;

/**
 * Eventbrite API wrapper for Laravel
 *
 * @package  Eventbrite
 * @author   @marat555
 */
interface Client
{

    /**
     * @param $endPoint
     * @param array $params
     * @return mixed
     */
    public function get($endPoint, array $params = []);

    /**
     * @param $endPoint
     * @param array $params
     * @return mixed
     */
    public function post($endPoint, array $params = []);
}
