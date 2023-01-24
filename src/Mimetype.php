<?php

declare(strict_types=1);

namespace Fuwasegu\PhpBase64Image;

enum Mimetype: string
{
    case JPEG = 'image/jpeg';

    case PNG = 'image/png';

    public function toExtension(): Extension
    {
        return match ($this) {
            self::JPEG => Extension::JPEG,
            self::PNG => Extension::PNG,
        };
    }

    public static function implodeValues(string $separator = ', '): string
    {
        return implode($separator, array_column(self::cases(), 'value'));
    }
}
