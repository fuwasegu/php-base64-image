<?php

declare(strict_types=1);

namespace Fuwasegu\PhpBase64Image\Contract;

use Fuwasegu\PhpBase64Image\Extension;
use Fuwasegu\PhpBase64Image\Mimetype;

interface Image
{
    public function mimetype(): Mimetype;

    public function extension(): Extension;

    public function data(): string;
}
