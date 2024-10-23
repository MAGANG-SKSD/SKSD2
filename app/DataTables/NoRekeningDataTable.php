<?php

namespace App\DataTables;

use App\Models\NoRekening;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class NoRekeningDataTable extends DataTable
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
            ->addColumn('jenis_norekening_nama', function (NoRekening $noRekening) {
                return $noRekening->jenis_norekening_nama; // Menggunakan accessor
            })
            ->addColumn('kelompok_norekening_nama', function (NoRekening $noRekening) {
                return $noRekening->kelompok_norekening_nama; // Menggunakan accessor
            })
            ->addColumn('action', function (NoRekening $noRekening) {
                return view('no_rekenings.action', compact('noRekening'));
            });
    }


    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\NoRekening $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(NoRekening $model)
    {
        // Get filtered data based on request
        $query = $model->newQuery()->orderBy('id', 'ASC');

        // Check if there's a jenis_norekening_id filter applied
        if (request()->has('jenis_norekening_id') && request()->get('jenis_norekening_id') != '') {
            $query->where('jenis_norekening_id', request()->get('jenis_norekening_id'));
        }

        // Check if there's a kelompok_norekening_id filter applied
        if (request()->has('kelompok_norekening_id') && request()->get('kelompok_norekening_id') != '') {
            $query->where('kelompok_norekening_id', request()->get('kelompok_norekening_id'));
        }

        return $query;
    }



    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->setTableId('norekening-table')
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
            Column::make('id')->title('Nomor Rekening'),
            Column::make('jenis_norekening_nama')->title('Jenis Norekening'),
            Column::make('kelompok_norekening_nama')->title('Kelompok Norekening'),
            Column::make('nama'),
            Column::computed('action') // This should match the action parameter in your map function
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
        return 'NoRekening_' . date('YmdHis');
    }
}