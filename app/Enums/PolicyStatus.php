<?php

namespace App\Enums;

enum PolicyStatus: string
{
    case Active = 'Active';
    case Inactive = 'Inactive';
    case Draft = 'Draft';
}
