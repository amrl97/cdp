<?php

namespace App\Enums;

enum ContractStatus: string
{
    case Active = 'Active';
    case Inactive = 'Inactive';
    case Expired = 'Expired';
}
