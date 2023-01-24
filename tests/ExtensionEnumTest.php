<?php

declare(strict_types=1);

namespace Fuwasegu\PhpImage\Tests;

use Fuwasegu\PhpImage\Extension;
use Fuwasegu\PhpImage\Mimetype;
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
