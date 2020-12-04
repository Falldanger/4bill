<?php

namespace App\Roles;

use App\Roles\Abstracts\AbstractRole;
use App\Roles\Contracts\RoleContract;
use App\Roles\Contracts\UserRoles;

class AdminRole extends AbstractRole implements RoleContract, UserRoles
{
    protected $name = UserRoles::ROLE_ADMIN;

    protected $id = 2;
}
