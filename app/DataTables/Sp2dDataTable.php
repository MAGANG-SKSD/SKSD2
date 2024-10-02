<?php

namespace App\DataTables;

use App\Models\Sp2d;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;

class Sp2dDataTable extends DataTable
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
            ->setTableId('sp2ds-table') // Set ID untuk DataTables
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->addAction(['width' => '120px', 'printable' => false])
            ->parameters([
                'dom'       => 'Bfrtip',
                'stateSave' => true,
                'order'     => [[0, 'desc']],
                'buttons'   => [
                    ['extend' => 'create', 'className' => 'btn btn-primary btn-sm no-corner', 'text' => 'Create'],
                    ['extend' => 'export', 'className' => 'btn btn-primary btn-sm no-corner', 'text' => 'Export'],
                    ['extend' => 'print', 'className' => 'btn btn-primary btn-sm no-corner', 'text' => 'Print'],
                    ['extend' => 'reset', 'className' => 'btn btn-primary btn-sm no-corner', 'text' => 'Reset'],
                    ['extend' => 'reload', 'className' => 'btn btn-primary btn-sm no-corner', 'text' => 'Reload'],
                ],
                'scrollX'   => true,
                'language'  => [
                    'search'         => 'Search:',
                    'lengthMenu'     => 'Show _MENU_ entries',
                    'info'           => 'Showing _START_ to _END_ of _TOTAL_ entries',
                    'infoEmpty'      => 'No entries found',
                    'infoFiltered'   => '(filtered from _MAX_ total entries)',
                    'loadingRecords' => 'Loading...',
                    'processing'     => 'Processing...',
                    'searchPlaceholder' => 'Search...',
                    'zeroRecords'    => 'No matching records found',
                ],
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
            'desa_id' => ['title' => 'Desa ID'],
            'nomor_sp2d' => ['title' => 'SP2D Number'],
            'tanggal_sp2d' => ['title' => 'SP2D Date'],
            'jumlah_dana' => ['title' => 'Amount'],
            'laporan' => ['title' => 'Laporan'],
            'rekomendasi' => ['title' => 'Rekomendasi'],
            'surat_pengantar' => ['title' => 'Surat Pengantar'],
            'lembaran_desa' => ['title' => 'Lembaran Desa'],
            'berita_desa' => ['title' => 'Berita Desa'],
            'berita_acara' => ['title' => 'Berita Acara'],
            'notulen' => ['title' => 'Notulen'],
            'daftar_hadir_pertemuan' => ['title' => 'Daftar Hadir Pertemuan Rapat'],
            'daftar_hadir' => ['title' => 'Daftar Hadir'],
            'pencairan_dana' => ['title' => 'Pencairan Dana'],
            'Surat_Perintah' => ['title' => 'Surat Perintah'],
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'sp2ds_datatable_' . time();
    }
}
