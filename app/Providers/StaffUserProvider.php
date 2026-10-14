<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Auth\EloquentUserProvider;
use Illuminate\Contracts\Auth\Authenticatable;

class StaffUserProvider extends EloquentUserProvider
{
    /**
     * Retrieve a staff user for password reset operations.
     *
     * @param  array<string, mixed>  $credentials
     */
    public function retrieveByCredentials(#[\SensitiveParameter] array $credentials): ?Authenticatable
    {
        $user = parent::retrieveByCredentials($credentials);

        return $user instanceof User && $user->isStaff() ? $user : null;
    }
}
