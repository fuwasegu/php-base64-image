# 📷 fuwasegu/php-image
The image file manager for PHP

# 📦 Installation
```shell
composer require fuwasegu/php-image
```

# ✅ Usage
Assuming you are using this package in a Laravel project, you can use it as follows:

```php
<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Fuwasegu\PhpImage\Image;
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