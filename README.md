# 📷 fuwasegu/php-base64-image
[![Coverage Status](https://coveralls.io/repos/github/lunain84/php-base64-image/badge.svg?branch=master)](https://coveralls.io/github/lunain84/php-base64-image?branch=master)
![example workflow](https://github.com/lunain84/php-base64-image/actions/workflows/ci.yml/badge.svg)
[![MIT License](http://img.shields.io/badge/license-MIT-blue.svg?style=flat)](LICENSE)

Library for easy handling of base64-encoded images in PHP

# 📦 Installation
```shell
composer require fuwasegu/php-base64-image
```

# ✅ Usage
Assuming you are using this package in a Laravel project, you can use it as follows:

```php
<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Fuwasegu\PhpBase64Image\Image;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Str;

class ImageSaveController
{
    public function __invoke(Request $request): JsonResponse
    {
        // Base64 encoded image data uri
        $dataUri = $request->input('image');
        
        // Create Image object from base64 image data uri
        $image = Image::fromBase64($dataUri);
        
        // Random string for image name based on uuid
        $uuid = Str::uuid();
        
        // Upload to S3 using Storage facade
        Storage::put(
            path: "images/{$uuid}.{$image->extension()->value}",
            contents: $image->data(),
            options: 'private',
        );
        
        return new JsonResponse(['message' => 'success'], 200);
    }
}
```