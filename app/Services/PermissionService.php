<?php
namespace App\Services;

use App\Interfaces\PermissionInterface;

class PermissionService
{
    protected $permission;

    public function __construct(PermissionInterface $permission)
    {
        $this->permission = $permission;
    }

    public function index()
    {
        $permissions = $this->permission->index();
        return $permissions;
    }

    public function store($data)
    {
        $permission = $this->permission->store($data);
        return $permission;
    }

    public function show($id)
    {
        $permission = $this->permission->show($id);
        return $permission;
    }

    public function update($data, $id)
    {
        $permission = $this->permission->update($data, $id);
        return $permission;
    }

    public function destroy($id)
    {
        $permission = $this->permission->destroy($id);
        return $permission;
    }

    public function find($id)
    {
        $permission = $this->permission->find($id);
        return $permission;
    }
}
