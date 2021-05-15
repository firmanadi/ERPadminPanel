<?php
namespace App\Repositories;

use App\Models\Permission;
use App\Interfaces\PermissionInterface;

class PermissionRepository implements PermissionInterface
{
    protected $permission;

    public function __construct(Permission $permission)
    {
        $this->permission = $permission;
    }

    public function index()
    {
        $permissions = $this->permission::all();
        return $permissions;
    }

    public function store($data)
    {
        $permission = $this->permission::create($data);
        return $permission;
    }

    public function show($id)
    {
        $permission = $this->permission::findOrFail($id);
        return $permission;
    }

    public function update($data, $id)
    {
        $permission = $this->permission::findOrFail($id);
        $permission->fill($data);
        $permission->save();
        return $permission;
    }

    public function destroy($id)
    {
        $permission = $this->permission::findOrFail($id);
        $permission->delete();
        return $permission;
    }
    public function find($id)
    {
        $permission = $this->permission::findOrFail($id);
        return $permission;
    }
}
