<?php

declare(strict_types=1);

namespace Fuwasegu\PhpBase64Image;

use finfo;
use Fuwasegu\PhpBase64Image\Contract\Exceptions\InvalidMimetypeException;
use Fuwasegu\PhpBase64Image\Contract\Image as ImageContract;
use RuntimeException;
use ValueError;

final class Image implements ImageContract
{
    private readonly Mimetype $mimetype;
    private readonly Extension $extension;

    /**
     * @throws InvalidMimetypeException
     */
    public function __construct(private readonly string $data)
    {
        if (false === $mimetype = (new finfo(FILEINFO_MIME_TYPE))->buffer($data)) {
            return;
        }

        try {
            $this->mimetype = Mimetype::from($mimetype);
        } catch (ValueError) {
            throw new InvalidMimetypeException();
        }

        $this->extension = $this->mimetype->toExtension();
    }

    /**
     * @throws InvalidMimetypeException
     */
    public static function fromBase64(string $data): Image
    {
        [, $split] = explode(';', $data, 2) + [1 => ''];
        [, $split] = explode(',', $split, 2) + [1 => ''];

        if (false === $decoded = base64_decode($split, true)) {
            throw new RuntimeException('The data uri is broken.');
        }
        assert(is_string($decoded));

        return new Image($decoded);
    }

    public function mimetype(): Mimetype
    {
        return $this->mimetype;
    }

    public function extension(): Extension
    {
        return $this->extension;
    }

    public function data(): string
    {
        return $this->data;
    }
}
