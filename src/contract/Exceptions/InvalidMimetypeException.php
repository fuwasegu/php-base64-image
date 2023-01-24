<?php

declare(strict_types=1);

namespace Fuwasegu\PhpBase64Image\Contract\Exceptions;

use Exception;
use Fuwasegu\PhpBase64Image\Mimetype;
use Throwable;

class InvalidMimetypeException extends Exception
{
    public function __construct(string $message = '', int $code = 0, ?Throwable $previous = null)
    {
        parent::__construct(
            message: $message !== ''
                ? $message
                : ('The following mimetypes are allowed: ' . Mimetype::implodeValues()),
            code: $code,
            previous: $previous,
        );
    }
}
