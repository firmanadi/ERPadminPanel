<?php
namespace App\Services;

use App\Interfaces\RoleInterface;

class RoleService
{
    protected $role;

    public function __construct(RoleInterface $role)
    {
        $this->role = $role;
    }

    public function index()
    {
        $roles = $this->role->index();
        return $roles;
    }

    public function store($data)
    {
        $input = $data->except(['permissions']);
        $role = $this->role->store($input);
        if($data->permissions <> ''){
            $role->syncPermissions($data->permissions);
        }
        return $role;
    }

    public function show($id)
    {
        $role = $this->role->show($id);
        return $role;
    }

    public function update($data, $id)
    {
        $input = $data->except(['permissions']);
        $role = $this->role->update($input, $id);
        $role->syncPermissions($data->permissions);
        return $role;
    }

    public function destroy($id)
    {
        $role = $this->role->destroy($id);
        return $role;
    }

    public function find($id)
    {
        $role = $this->role->find($id);
        return $role;
    }
}
