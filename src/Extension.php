<?php

declare(strict_types=1);

namespace Fuwasegu\PhpBase64Image;

enum Extension: string
{
    case JPEG = 'jpeg';

    case PNG = 'png';

    public function toMimetype(): Mimetype
    {
        return match ($this) {
            self::PNG => Mimetype::PNG,
            self::JPEG => Mimetype::JPEG,
        };
    }
}
