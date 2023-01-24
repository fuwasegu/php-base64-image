<?php

declare(strict_types=1);

namespace Fuwasegu\PhpImage\Contract;

use Fuwasegu\PhpImage\Extension;
use Fuwasegu\PhpImage\Mimetype;

interface Image
{
    public function mimetype(): Mimetype;

    public function extension(): Extension;

    public function data(): string;
}
