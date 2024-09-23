<?php

namespace App\DataTables;

use App\Facades\UtilityFacades;
use App\Models\Sp2d;  // Mengganti Modul dengan Sp2d
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class Sp2dsDataTable extends DataTable
{
    public function dataTable($query)
    {
        $dataTable = new EloquentDataTable($query);

        return $dataTable->addColumn('action', 'sp2ds.datatables_actions'); // Menyesuaikan dengan action.blade.php
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Sp2d $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Sp2d $model)
    {
        return $model->newQuery()->orderBy('id', 'ASC');
    }

    public function html()
    {
        return $this->builder()
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->orderBy(1)
            ->language([
                "paginate" => [
                    "next" => '<i class="fas fa-angle-right"></i>',
                    "previous" => '<i class="fas fa-angle-left"></i>'
                ]
            ])
            ->parameters([
                "dom" =>  "
                                <'row'<'col-sm-12'><'col-sm-9'B><'col-sm-3'f>>
                                <'row'<'col-sm-12'tr>>
                                <'row mt-3 container-fluid'<'col-sm-5'i><'col-sm-7'p>>
                                ",
                'buttons'   => [
                    ['extend' => 'create', 'className' => 'btn btn-default btn-sm no-corner',],
                    ['extend' => 'export', 'className' => 'btn btn-default btn-sm no-corner',],
                    ['extend' => 'print', 'className' => 'btn btn-default btn-sm no-corner',],
                    ['extend' => 'reset', 'className' => 'btn btn-default btn-sm no-corner',],
                    ['extend' => 'reload', 'className' => 'btn btn-default btn-sm no-corner',],
                ],
                "scrollX" => true
            ])
            ->language([
                'buttons' => [
                    'create' => __('Create'),
                    'export' => __('Export'),
                    'print' => __('Print'),
                    'reset' => __('Reset'),
                    'reload' => __('Reload'),
                    'excel' => __('Excel'),
                    'csv' => __('CSV'),
                    'pageLength' => __('Show %d rows'),
                ]
            ]);
    }

    protected function getColumns()
    {
        return [
            'desa_id',
            'nomor_sp2d',
            'tanggal_sp2d',
            'jumlah_dana'
        ];
    }

    protected function filename()
    {
        return 'Sp2ds_' . date('YmdHis');
    }
}
