<?php

namespace App\Roles\Contracts;

interface UserRoles
{
    const ROLE_ADMIN = 'AdminRole';
    const ROLE_USER = 'UserRole';

    const AVAILABLE_ROLES = [
        self::ROLE_ADMIN,
        self::ROLE_USER
    ];
}
