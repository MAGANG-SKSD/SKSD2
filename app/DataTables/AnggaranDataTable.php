<?php

namespace App\DataTables;

use App\Models\Anggaran;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\Html\Column;

class AnggaranDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->addColumn('action', function (Anggaran $anggaran) {
                return view('realisasi_anggarans.action', compact('anggaran'));
            });    
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Anggaran $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Anggaran $model)
    {
        return $model->newQuery()->orderBy('id', 'ASC');
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->setTableId('anggaran-table')
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
                'buttons' => [
                    ['extend' => 'create', 'className' => 'btn btn-primary btn-sm no-corner'],
                    ['extend' => 'export', 'className' => 'btn btn-primary btn-sm no-corner'],
                    ['extend' => 'reset', 'className' => 'btn btn-primary btn-sm no-corner'],
                    ['extend' => 'reload', 'className' => 'btn btn-primary btn-sm no-corner'],
                    ['extend' => 'pageLength', 'className' => 'btn btn-primary btn-sm no-corner'],
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

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            Column::make('id'),
            Column::make('desa_id'),
            Column::make('tahun'),
            Column::make('belanja_anggaran'),
            Column::make('dana_tidak_terpakai'),
            Column::make('laporan'),
            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->addClass('text-center'),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'anggaran_datatable_' . date('YmdHis');
    }
}