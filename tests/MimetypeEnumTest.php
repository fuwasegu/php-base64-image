<?php

declare(strict_types=1);

namespace Fuwasegu\PhpBase64Image\Tests;

use Fuwasegu\PhpBase64Image\Extension;
use Fuwasegu\PhpBase64Image\Mimetype;
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
