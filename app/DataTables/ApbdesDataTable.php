<?php

namespace App\DataTables;

use App\Models\APBDes;
use Yajra\DataTables\Services\DataTable;

class APBDesDataTable extends DataTable
{
    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->addColumn('action', function ($row) {
                return '
                    <a href="'.route('apbdes.anggaran', $row->id).'" class="btn btn-info btn-sm">Anggaran</a>
                    <a href="'.route('apbdes.verifikasi', $row->id).'" class="btn btn-success btn-sm">Verifikasi</a>
                    <a href="'.route('apbdes.realisasi', $row->id).'" class="btn btn-primary btn-sm">Realisasi</a>
                ';
            });
    }

    public function query(APBDes $model)
    {
        return $model->newQuery()->with('desa');
    }

    public function html()
    {
        return $this->builder()
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->addAction(['width' => '80px']);
    }

    protected function getColumns()
    {
        return [
            'desa.name' => ['title' => 'Desa'],
            'tahun',
            'total_anggaran',
            'status_persetujuan',
        ];
    }

    protected function filename()
    {
        return 'APBDes_' . date('YmdHis');
    }
}
