<?php

namespace Fuwasegu\PhpImage\Tests\Exceptions;

use Fuwasegu\PhpImage\Contract\Exceptions\InvalidMimetypeException;
use PHPUnit\Framework\TestCase;

class InvalidMimetypeExceptionTest extends TestCase
{
    public function testExceptionMessage(): void
    {
        $this->expectExceptionMessage('The following mimetypes are allowed: image/jpeg, image/png');

        throw new InvalidMimetypeException();
    }
}
