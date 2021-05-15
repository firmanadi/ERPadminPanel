<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePermissionRequest;
use App\Http\Requests\UpdatePermissionRequest;
use App\Services\PermissionService;
use Illuminate\Contracts\View\View;
use Laracasts\Flash\Flash;

class PermissionController extends Controller
{
    /** @var  PermissionService */
    protected $permission;
    public function __construct(PermissionService $permission)
    {
        $this->permission = $permission;
    }

    /**
     * Show the form for creating a new Permission.
     *
     * @return View
     */
    public function create()
    {
        return view('permissions.create');
    }

    /**
     * Store a newly created Permission in storage.
     *
     * @param CreatePermissionRequest $request
     *
     * @return \Illuminate\Contracts\Foundation\Application|View|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(CreatePermissionRequest $request)
    {
        $this->permission->store($request->all());

        Flash::success('Permission saved successfully.');

        return redirect(route('permissions.index'));
    }

    /**
     * Display the specified Permission.
     *
     * @param  int $id
     *
     * @return \Illuminate\Contracts\Foundation\Application|View|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function show($id)
    {
        $permission = $this->permission->show($id);

        if (empty($permission)) {
            Flash::error('Permission not found');

            return redirect(route('permissions.index'));
        }

        return view('permissions.show')->with('permission', $permission);
    }

    /**
     * Show the form for editing the specified Permission.
     *
     * @param  int $id
     *
     * @return \Illuminate\Contracts\Foundation\Application|View|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function edit($id)
    {
        $permission = $this->permission->show($id);

        if (empty($permission)) {
            Flash::error('Permission not found');

            return redirect(route('permissions.index'));
        }

        return view('permissions.edit')
            ->with('permission', $permission);
    }

    /**
     * Update the specified Permission in storage.
     *
     * @param  int              $id
     * @param UpdatePermissionRequest $request
     *
     * @return \Illuminate\Contracts\Foundation\Application|View|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update($id, UpdatePermissionRequest $request)
    {
        $permission = $this->permission->find($id);

        if (empty($permission)) {
            Flash::error('Permission not found');

            return redirect(route('permissions.index'));
        }

        $this->permission->update($request->all(), $id);

        Flash::success('Permission updated successfully.');

        return redirect(route('permissions.index'));
    }

    /**
     * Remove the specified Permission from storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Contracts\Foundation\Application|View|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        $permission = $this->permission->find($id);

        if (empty($permission)) {
            Flash::error('Permission not found');

            return redirect(route('permissions.index'));
        }

        $this->permission->destroy($id);

        Flash::success('Permission deleted successfully.');

        return redirect(route('permissions.index'));
    }

}
