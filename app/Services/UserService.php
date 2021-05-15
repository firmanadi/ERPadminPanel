<?php
namespace App\Services;

use App\Interfaces\UsersInterface;

class UserService
{
    protected $user;

    public function __construct(UsersInterface $user)
    {
        $this->user = $user;
    }

    public function index()
    {
        $users = $this->user->index();
        return $users;
    }

    public function store($data)
    {
        $user = $this->user->store($data->all());
        if($data->roles <> ''){
            $user->roles()->attach($data->roles);
        }
        return $user;
    }

    public function show($id)
    {
        $user = $this->user->show($id);
        return $user;
    }

    public function update($data, $id)
    {
        $user = ($data->get('password') == '') ? $this->user->update($data->except(['password']), $id) : $this->user->update($data->all(), $id);

        if ($data->roles <> '') {
            $user->syncRoles($data->roles);
        }
        else {
            $user->roles()->detach();
        }
        return $user;
    }

    public function destroy($id)
    {
        $user = $this->user->destroy($id);
        return $user;
    }

    public function find($id)
    {
        $user = $this->user->find($id);
        return $user;
    }
}
