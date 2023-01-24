<?php

declare(strict_types=1);

namespace Fuwasegu\PhpBase64Image\Tests\Exceptions;

use Fuwasegu\PhpBase64Image\Contract\Exceptions\InvalidMimetypeException;
use PHPUnit\Framework\TestCase;

class InvalidMimetypeExceptionTest extends TestCase
{
    public function testExceptionMessage(): void
    {
        $this->expectExceptionMessage('The following mimetypes are allowed: image/jpeg, image/png');

        throw new InvalidMimetypeException();
    }
}
