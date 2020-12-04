<?php

namespace App\Roles;

use App\Roles\Abstracts\AbstractRole;
use App\Roles\Contracts\RoleContract;
use App\Roles\Contracts\UserRoles;

class UserRole extends AbstractRole implements RoleContract, UserRoles
{
    protected $name = UserRoles::ROLE_USER;

    protected $id = 1;
}
