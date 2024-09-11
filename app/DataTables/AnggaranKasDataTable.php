<?php

// app/DataTables/AnggaranKasDataTable.php

namespace App\DataTables;

use App\Models\AnggaranKas;
use Yajra\DataTables\Services\DataTable;

class AnggaranKasDataTable extends DataTable
{
    public function dataTable($query)
    {
        return datatables()
            ->of($query)
            ->addColumn('action', function($row) {
                return '<a href="' . route('anggaran-kas.edit', $row->id) . '" class="btn btn-warning btn-sm">Edit</a>
                        <a href="' . route('anggaran-kas.destroy', $row->id) . '" class="btn btn-danger btn-sm" onclick="event.preventDefault(); document.getElementById(\'delete-form-' . $row->id . '\').submit();">Delete</a>
                        <form id="delete-form-' . $row->id . '" action="' . route('anggaran-kas.destroy', $row->id) . '" method="POST" style="display: none;">' . 
                        csrf_field() . method_field('DELETE') . '</form>';
            });
    }

    public function query()
    {
        return AnggaranKas::query();
    }

    public function html()
    {
        return $this->builder()
            ->columns([
                ['data' => 'id', 'title' => 'ID'],
                ['data' => 'nama', 'title' => 'Nama'],
                ['data' => 'jumlah', 'title' => 'Jumlah'],
                ['data' => 'keterangan', 'title' => 'Keterangan'],
                ['data' => 'action', 'title' => 'Actions', 'orderable' => false, 'searchable' => false]
            ])
            ->parameters([
                'dom' => 'Bfrtip',
                'buttons' => ['copy', 'excel', 'csv', 'pdf', 'print'],
            ]);
    }
}
