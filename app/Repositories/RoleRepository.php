<?php
namespace App\Repositories;

use Spatie\Permission\Models\Role;
use App\Interfaces\RoleInterface;

class RoleRepository implements RoleInterface
{
    protected $role;

    public function __construct(Role $role)
    {
        $this->role = $role;
    }

    public function index()
    {
        $roles = $this->role::all();
        return $roles;
    }

    public function store($data)
    {
        $role = $this->role::create($data);
        return $role;
    }

    public function show($id)
    {
        $role = $this->role::findOrFail($id);
        return $role;
    }

    public function update($data, $id)
    {
        $role = $this->role::findOrFail($id);
        $role->fill($data);
        $role->save();
        return $role;
    }

    public function destroy($id)
    {
        $role = $this->role::findOrFail($id);
        $role->delete();
        return $role;
    }
    public function find($id)
    {
        $role = $this->role::findOrFail($id);
        return $role;
    }
}
