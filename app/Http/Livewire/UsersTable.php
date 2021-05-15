<?php

namespace App\Http\Livewire;

use App\Models\User;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
use Mediconesystems\LivewireDatatables\NumberColumn;

class UsersTable extends LivewireDatatable
{
    public $model = User::class;
    public function columns()
    {
        return [
            NumberColumn::name('id')
                ->label('ID'),

            Column::name('name')
                ->defaultSort('asc')
                ->searchable()
                ->filterable(),

            Column::name('email')
                ->label('Email')
                ->searchable()
                ->filterable(),

            DateColumn::name('created_at')
                ->label('Created At')
                ->format(),

            Column::callback(['id', 'name'], function ($id, $name) {
                return view('users.datatables_actions', ['id' => $id, 'name' => $name]);
            })
        ];
    }
}
