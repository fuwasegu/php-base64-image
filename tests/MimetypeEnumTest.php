<?php

namespace Fuwasegu\PhpImage\Tests;

use Fuwasegu\PhpImage\Extension;
use Fuwasegu\PhpImage\Mimetype;
use PHPUnit\Framework\TestCase;

class MimetypeEnumTest extends TestCase
{
    public function testMimetypeToExtensionConversion(): void
    {
        $jpeg = Mimetype::JPEG;
        $this->assertSame(Extension::JPEG, $jpeg->toExtension());

        $png = Mimetype::PNG;
        $this->assertSame(Extension::PNG, $png->toExtension());
    }

    public function testImplodeValues(): void
    {
        $this->assertSame(
            'image/jpeg, image/png',
            Mimetype::implodeValues(),
        );

        $this->assertSame(
            'image/jpeg-image/png',
            Mimetype::implodeValues('-'),
        );
    }
}
