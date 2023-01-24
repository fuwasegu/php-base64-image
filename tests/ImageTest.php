<?php

declare(strict_types=1);

namespace Fuwasegu\PhpBase64Image\Tests;

use Fuwasegu\PhpBase64Image\Extension;
use Fuwasegu\PhpBase64Image\Image;
use Fuwasegu\PhpBase64Image\Mimetype;
use PHPUnit\Framework\TestCase;
use RuntimeException;

class ImageTest extends TestCase
{
    public function testCreateFromBase64(): void
    {
        $file = file_get_contents(__DIR__ . '/files/pikachu.png');
        assert(is_string($file));

        $encoded = base64_encode($file);
        $base64 = "data:image/png;base64,{$encoded}";
        $image = Image::fromBase64($base64);

        $this->assertSame($image->extension(), Extension::PNG);
        $this->assertSame($image->mimetype(), Mimetype::PNG);
        $this->assertSame($image->data(), $file);
    }

    public function testWhenReceivingCorruptedData(): void
    {
        $this->expectException(RuntimeException::class);
        $this->expectExceptionMessage('The data uri is broken.');
        Image::fromBase64('data:image/png;base64,{?><');
    }
}
