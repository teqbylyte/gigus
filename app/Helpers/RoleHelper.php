<?php

namespace App\Helpers;

use App\Models\Role;
use Illuminate\Database\Eloquent\Model;

class RoleHelper
{
    public function __construct(public string $name)
    {
        $this->name = ucwords(strtolower($this->name));
    }

    /**
     * Get the role model of the specified name instance
     *
     * If the role does not exist, create another role model and return.
     *
     * @return Role|Model
     */
    public function getRole(): Role|Model
    {
        $role = Role::query()->where('name', $this->name)->first();

        return $role ?? $this->createRole();
    }

    /**
     * Create the role of the instance name
     * @return Role|Model
     */
    private function createRole(): Role|Model
    {
        $new_role = new Role();

        $role = [
            'name' => $this->name,
            'slug' => General::generateSlug($this->name, $new_role, 'name'),
        ];

        $new_role->newQuery()->create($role);

        return $new_role;
    }
}
