<?php

namespace App\Repositories;

use Spatie\Permission\Models\Role;

class RoleRepository extends ResourceRepository
{

    public function __construct(Role $role)
    {
        $this->model = $role;
    }
}