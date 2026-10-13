<?php

namespace App\Enums;

enum CertificateStatus: string
{
    case Invalid = 'Invalid';
    case Valid = 'Valid';
    case Expired = 'Expired';
    case Revoked = 'Revoked';
}
