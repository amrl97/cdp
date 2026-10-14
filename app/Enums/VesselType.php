<?php

namespace App\Enums;

enum VesselType: string
{
    case AHTS = 'Anchor Handling Tug Supply';
    case AWB = 'Accommodation Work Barge';
    case WB = 'Work Boat';
}
