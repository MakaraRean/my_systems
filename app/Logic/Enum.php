<?php

namespace App\Logic\Enum;

use Illuminate\Validation\Rules\Enum;

Enum Message: string{
    case ProductAvailable = "This product is available.";
    case ProductUnavailable = "This product is unavailable.";
}
