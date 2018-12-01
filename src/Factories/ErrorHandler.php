<?php

namespace Marat555\Eventbrite\Factories;

use Illuminate\Http\Response;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use Marat555\Eventbrite\Exceptions\NotFoundException;
use Marat555\Eventbrite\Exceptions\EventbriteErrorException;
use Marat555\Eventbrite\Exceptions\MethodNotAllowedException;
use Marat555\Eventbrite\Exceptions\BadPageException;
use Marat555\Eventbrite\Exceptions\ExpansionFailedException;
use Marat555\Eventbrite\Exceptions\HitRateLimitException;
use Marat555\Eventbrite\Exceptions\InternalErrorException;
use Marat555\Eventbrite\Exceptions\InvalidAuthException;
use Marat555\Eventbrite\Exceptions\InvalidAuthHeaderException;
use Marat555\Eventbrite\Exceptions\InvalidBatchException;
use Marat555\Eventbrite\Exceptions\NoAuthException;
use Marat555\Eventbrite\Exceptions\NotAuthorizedException;

class ErrorHandler
{
    public function __invoke(callable $handler)
    {
        return function (RequestInterface $request, array $options) use ($handler) {
            return $handler($request, $options)->then(function ($response) {
                if ($this->isSuccessful($response)) {
                    return $response;
                }
                $this->handleErrorResponse($response);
            });
        };
    }

    public function isSuccessful(ResponseInterface $response)
    {
        return $response->getStatusCode() < Response::HTTP_BAD_REQUEST;
    }

    /**
     * @param ResponseInterface $response
     * @throws EventbriteErrorException
     * @throws Exception
     */
    public function handleErrorResponse(ResponseInterface $response)
    {
        $eventbrite = json_decode($response->getBody()->getContents());

        switch ($eventbrite->error) {
            case "INVALID_AUTH":
                throw new InvalidAuthException($eventbrite->error_description, $eventbrite->status_code);
            case "NOT_FOUND":
                throw new NotFoundException($eventbrite->error_description, $eventbrite->status_code);
            case "INVALID_AUTH_HEADER":
                throw new InvalidAuthHeaderException($eventbrite->error_description, $eventbrite->status_code);
            case "NO_AUTH":
                throw new NoAuthException($eventbrite->error_description, $eventbrite->status_code);
            case "BAD_PAGE":
                throw new BadPageException($eventbrite->error_description, $eventbrite->status_code);
            case "NOT_AUTHORIZED":
                throw new NotAuthorizedException($eventbrite->error_description, $eventbrite->status_code);
            case "METHOD_NOT_ALLOWED":
                throw new MethodNotAllowedException($eventbrite->error_description, $eventbrite->status_code);
            case "HIT_RATE_LIMIT":
                throw new HitRateLimitException($eventbrite->error_description, $eventbrite->status_code);
            case "INTERNAL_ERROR":
                throw new InternalErrorException($eventbrite->error_description, $eventbrite->status_code);
            case "EXPANSION_FAILED":
                throw new ExpansionFailedException($eventbrite->error_description, $eventbrite->status_code);
            case "INVALID_BATCH":
                throw new InvalidBatchException($eventbrite->error_description, $eventbrite->status_code);
            default:
                throw new EventbriteErrorException($eventbrite->error_description ? $eventbrite->error_description : $eventbrite->eventbrite->code, $eventbrite->status_code);

        }
    }
}
