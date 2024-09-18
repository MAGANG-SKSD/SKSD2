<?php

namespace App\DataTables;

use App\Models\Dokumen;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;

class DokumenDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        $dataTable = new EloquentDataTable($query);

        return $dataTable->addColumn('action', 'dokumens.action'); // Menyesuaikan dengan action.blade.php untuk dokumen
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Dokumen $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Dokumen $model)
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->setTableId('dokumen-table') // Set ID untuk DataTables
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->addAction(['width' => '120px', 'printable' => false])
            ->parameters([
                'dom'       => 'Bfrtip',
                'stateSave' => true,
                'order'     => [[0, 'desc']],
                'buttons'   => [
                    ['extend' => 'create', 'className' => 'btn btn-primary btn-sm no-corner'],
                    ['extend' => 'export', 'className' => 'btn btn-primary btn-sm no-corner'],
                    ['extend' => 'print', 'className' => 'btn btn-primary btn-sm no-corner'],
                    ['extend' => 'reset', 'className' => 'btn btn-primary btn-sm no-corner'],
                    ['extend' => 'reload', 'className' => 'btn btn-primary btn-sm no-corner'],
                ],
                'scrollX' => true
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
            'dana_id' => ['title' => 'Dana ID'], // Menyesuaikan judul kolom
            'jenis_dokumen' => ['title' => 'Jenis Dokumen'],
            'file_path' => ['title' => 'File Path'],
            'status_verifikasi' => ['title' => 'Status Verifikasi'],
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'dokumen_datatable_' . time();
    }
}
