<?php

namespace App\Enums;

enum UserRole: string
{
    case Administrator = 'Administrator';
    case CrewingStaff = 'Crewing Staff';
    case ShipCrew = 'Ship Crew';
}
