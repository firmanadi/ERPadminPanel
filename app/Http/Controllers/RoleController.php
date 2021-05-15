<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateRoleRequest;
use App\Http\Requests\UpdateRoleRequest;
use App\Services\PermissionService;
use App\Services\RoleService;
use Illuminate\Contracts\View\View;
use Laracasts\Flash\Flash;

class RoleController extends Controller
{
    /** @var  RoleService */
    /** @var  PermissionService */
    protected $role;
    protected $permission;
    public function __construct(RoleService $role, PermissionService $permission)
    {
        $this->role = $role;
        $this->permission = $permission;
    }

    /**
     * Show the form for creating a new Role.
     *
     * @return View
     */
    public function create()
    {
        $permissions = $this->permission->index();
        return view('roles.create')
            ->with('permissions',$permissions);
    }

    /**
     * Store a newly created Role in storage.
     *
     * @param CreateRoleRequest $request
     *
     * @return \Illuminate\Routing\Redirector
     */
    public function store(CreateRoleRequest $request)
    {
        $this->role->store($request);

        Flash::success('Role saved successfully.');

        return redirect(route('roles.index'));
    }

    /**
     * Display the specified Role.
     *
     * @param  int $id
     *
     * @return View|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function show($id)
    {
        $role = $this->role->show($id);

        if (empty($role)) {
            Flash::error('Role not found');

            return redirect(route('roles.index'));
        }

        return view('roles.show')->with('role', $role);
    }

    /**
     * Show the form for editing the specified Role.
     *
     * @param  int $id
     *
     * @return View|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function edit($id)
    {
        $permissions = $this->permission->index();
        $role = $this->role->show($id);

        if (empty($role)) {
            Flash::error('Role not found');

            return redirect(route('roles.index'));
        }

        return view('roles.edit')
            ->with('role', $role)
            ->with('permissions', $permissions);
    }

    /**
     * Update the specified Role in storage.
     *
     * @param  int              $id
     * @param UpdateRoleRequest $request
     *
     * @return View|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update($id, UpdateRoleRequest $request)
    {
        $role = $this->role->find($id);

        if (empty($role)) {
            Flash::error('Role not found');

            return redirect(route('roles.index'));
        }
        $this->role->update($request,$id);

        Flash::success('Role updated successfully.');

        return redirect(route('roles.index'));
    }

    /**
     * Remove the specified Role from storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        $role = $this->role->find($id);

        if (empty($role)) {
            Flash::error('Role not found');

            return redirect(route('roles.index'));
        }

        $this->role->destroy($id);

        Flash::success('Role deleted successfully.');

        return redirect(route('roles.index'));
    }

}
