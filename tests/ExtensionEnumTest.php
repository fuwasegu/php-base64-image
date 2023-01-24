<?php

declare(strict_types=1);

namespace Fuwasegu\PhpBase64Image\Tests;

use Fuwasegu\PhpBase64Image\Extension;
use Fuwasegu\PhpBase64Image\Mimetype;
use PHPUnit\Framework\TestCase;

class ExtensionEnumTest extends TestCase
{
    public function testExtensionToMimetypeConversion(): void
    {
        $jpeg = Extension::JPEG;
        $this->assertSame(Mimetype::JPEG, $jpeg->toMimetype());

        $png = Extension::PNG;
        $this->assertSame(Mimetype::PNG, $png->toMimetype());
    }
}
