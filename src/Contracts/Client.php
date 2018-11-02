<?php

namespace Marat555\Eventbrite\Contracts;

/**
 * Rancher API wrapper for Laravel
 *
 * @package  Rancher
 * @author   @benmagg
 */
interface Client {

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