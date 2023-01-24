<?php

declare(strict_types=1);

namespace Fuwasegu\PhpImage\Tests;

use Fuwasegu\PhpImage\Extension;
use Fuwasegu\PhpImage\Image;
use Fuwasegu\PhpImage\Mimetype;
use PHPUnit\Framework\TestCase;
use RuntimeException;

class ImageTest extends TestCase
{
    public function testCreateFromBase64(): void
    {
        $encoded = base64_encode($file = file_get_contents(__DIR__ . '/files/pikachu.png'));
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
