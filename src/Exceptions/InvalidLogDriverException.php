<?php

namespace Oskingv\HttpQueryLogger\Http\Exceptions;

use Exception;
use Throwable;

class InvalidLogDriverException extends Exception
{
    public function __construct(
        $message = 'Invalid Log Driver',
        $code = 0,
        Throwable $previous = null
    ) {
        parent::__construct($message, $code, $previous);
    }
}
