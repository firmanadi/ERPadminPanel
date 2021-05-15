<?php
namespace App\Interfaces;

interface PermissionInterface
{
    public function index();
    public function store($data);
    public function show($id);
    public function update($data, $id);
    public function destroy($id);
    public function find($id);
}
