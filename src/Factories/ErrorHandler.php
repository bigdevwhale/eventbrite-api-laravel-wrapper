<?php

namespace Marat555\Eventbrite\Factories;

use Illuminate\Http\Response;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use Marat555\Eventbrite\Exceptions\NotFoundException;
use Marat555\Eventbrite\Exceptions\NotUniqueException;
use Marat555\Eventbrite\Exceptions\ServerErrorException;
use Marat555\Eventbrite\Exceptions\InvalidTypeException;
use Marat555\Eventbrite\Exceptions\NotNullableException;
use Marat555\Eventbrite\Exceptions\InvalidStateException;
use Marat555\Eventbrite\Exceptions\EventbriteErrorException;
use Marat555\Eventbrite\Exceptions\UnauthorizedException;
use Marat555\Eventbrite\Exceptions\InvalidActionException;
use Marat555\Eventbrite\Exceptions\InvalidFormatException;
use Marat555\Eventbrite\Exceptions\InvalidOptionException;
use Marat555\Eventbrite\Exceptions\MissingRequiredException;
use Marat555\Eventbrite\Exceptions\MaxLimitExceededException;
use Marat555\Eventbrite\Exceptions\MethodNotAllowedException;
use Marat555\Eventbrite\Exceptions\InvalidReferenceException;
use Marat555\Eventbrite\Exceptions\InvalidCSRFTokenException;
use Marat555\Eventbrite\Exceptions\MinLimitExceededException;
use Marat555\Eventbrite\Exceptions\PermissionDeniedException;
use Marat555\Eventbrite\Exceptions\InvalidDateFormatException;
use Marat555\Eventbrite\Exceptions\MaxLengthExceededException;
use Marat555\Eventbrite\Exceptions\InvalidCharactersException;
use Marat555\Eventbrite\Exceptions\MinLengthExceededException;
use Marat555\Eventbrite\Exceptions\ActionNotAvailableException;
use Marat555\Eventbrite\Exceptions\ClusterUnavailableException;
use Marat555\Eventbrite\Exceptions\InvalidBodyContentException;

class ErrorHandler {

    public function __invoke(callable $handler)
    {
        return function (RequestInterface $request, array $options) use ($handler) {
            return $handler($request, $options)->then(function($response) {
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

    public function handleErrorResponse(ResponseInterface $response)
    {
        $eventbrite = json_decode($response->getBody()->getContents());

        throw new \Exception(json_encode($eventbrite));
        switch($eventbrite->error) {
            case "INVALID_AUTH":
                throw new UnauthorizedException($eventbrite->error_description, $eventbrite->status_code);
            case "Unauthorized":
                throw new UnauthorizedException($eventbrite->message, $eventbrite->status);
            case "PermissionDenied":
                throw new PermissionDeniedException($eventbrite->message, $eventbrite->status);
            case "NotFound":
                throw new NotFoundException($eventbrite->message, $eventbrite->status);
            case "MethodNotAllowed":
                throw new MethodNotAllowedException($eventbrite->message, $eventbrite->status);
            case "InvalidDateFormat":
                throw new InvalidDateFormatException($eventbrite->message, $eventbrite->status);
            case "InvalidFormat":
                throw new InvalidFormatException(property_exists($eventbrite, 'fieldName') ? "Invalid format for {$eventbrite->fieldName}" : "Invalid format", $eventbrite->status);
            case "InvalidReference":
                throw new InvalidReferenceException(property_exists($eventbrite, 'fieldName') ? "Invalid reference for {$eventbrite->fieldName}" : "Invalid reference", $eventbrite->status);
            case "NotNullable":
                throw new NotNullableException("{$eventbrite->fieldName} must be set", $eventbrite->status);
            case "NotUnique":
                throw new NotUniqueException("{$eventbrite->fieldName} is not unique", $eventbrite->status);
            case "MinLimitExceeded":
                throw new MinLimitExceededException("{$eventbrite->fieldName} is too small", $eventbrite->status);
            case "MaxLimitExceeded":
                throw new MaxLimitExceededException("{$eventbrite->fieldName} is too long", $eventbrite->status);
            case "MinLengthExceeded":
                throw new MinLengthExceededException("{$eventbrite->fieldName} is not long enough", $eventbrite->status);
            case "MaxLengthExceeded":
                throw new MaxLengthExceededException("{$eventbrite->fieldName} is too long", $eventbrite->status);
            case "InvalidOption":
                throw new InvalidOptionException("{$eventbrite->fieldName} is not a valid option", $eventbrite->status);
            case "InvalidCharacters":
                throw new InvalidCharactersException("{$eventbrite->fieldName} contains invalid characters", $eventbrite->status);
            case "MissingRequired":
                throw new MissingRequiredException("{$eventbrite->fieldName} is required", $eventbrite->status);
            case "InvalidCSRFToken":
                throw new InvalidCSRFTokenException("Invalid CSRF Token", $eventbrite->status);
            case "InvalidAction":
                throw new InvalidActionException("Invalid action", $eventbrite->status);
            case "InvalidBodyContent":
                throw new InvalidBodyContentException("Invalid body content", $eventbrite->status);
            case "InvalidType":
                throw new InvalidTypeException("Invalid type exception", $eventbrite->status);
            case "ActionNotAvailable":
                throw new ActionNotAvailableException($eventbrite->message ? $eventbrite->message : "This action is not currently available", $eventbrite->status);
            case "InvalidState":
                throw new InvalidStateException($eventbrite->message ? $eventbrite->message : "Invalid state", $eventbrite->status);
            case "ServerError":
                throw new ServerErrorException($eventbrite->message, $eventbrite->status);
            case "ClusterUnavailable":
                throw new ClusterUnavailableException($eventbrite->message, $eventbrite->status);
            default:
                throw new EventbriteErrorException($eventbrite->error_description ? $eventbrite->error_description : $eventbrite->eventbrite->code, $eventbrite->status_code);

        }

    }

}