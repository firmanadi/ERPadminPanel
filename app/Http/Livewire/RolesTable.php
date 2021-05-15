<?php

namespace App\Http\Livewire;

use App\Models\Role;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
use Mediconesystems\LivewireDatatables\NumberColumn;

class RolesTable extends LivewireDatatable
{
    public $model = Role::class;

    public function columns()
    {
        return [
            NumberColumn::name('id')
                ->label('ID'),

            Column::name('name')
                ->defaultSort('asc')
                ->searchable()
                ->filterable(),

            Column::name('guard_name')
                ->label('Guard Name')
                ->searchable()
                ->filterable(),

            DateColumn::name('created_at')
                ->label('Created At')
                ->format(),

            Column::callback(['id', 'name'], function ($id, $name) {
                return view('roles.datatables_actions', ['id' => $id, 'name' => $name]);
            })
        ];
    }
}
