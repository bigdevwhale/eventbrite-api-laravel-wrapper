<?php

namespace Marat555\Eventbrite\Factories\HelperEntity;

use Marat555\Eventbrite\Factories\Entity\AbstractEntity;

/**
 * This pagination key gives you information about the number of pages in the result, and how many objects are returned
 *
 * @package  Eventbrite
 * @author   @marat555
 */
class Pagination extends AbstractEntity
{

    /**
     * The total number of objects across all pages (optional)
     *
     * @var integer|null
     */
    public $objectCount;

    /**
     * The current page number
     *
     * @var string
     */
    public $pageNumber;

    /**
     * The number of objects on each page (roughly)
     *
     * @var integer
     */
    public $pageSize;

    /**
     * The total number of pages (starting at 1) (optional)
     *
     * @var integer|null
     */
    public $pageCount;

    /**
     * A token to return to the server to get the next set of results
     *
     * @var string
     */
    public $continuation;

    /**
     * A boolean indicating if the next request will contain any results
     *
     * @var boolean
     */
    public $hasMoreItems;
}
