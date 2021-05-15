<?php

namespace App\Http\Livewire;

use App\Models\Permission;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
use Mediconesystems\LivewireDatatables\NumberColumn;

class PermissionsTable extends LivewireDatatable
{
    public $model = Permission::class;

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
                return view('permissions.datatables_actions', ['id' => $id, 'name' => $name]);
            })
        ];
    }
}
