<?php

namespace App\DataTables;

use App\Models\Desa;
use Carbon\Carbon;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\Html\Builder;


class DesaDataTable extends DataTable
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
            ->addColumn('action', function ($desa) {
                return '
                    <a href="' . route('desas.show', $desa->desa_id) . '" class="btn btn-sm btn-primary">View</a>
                    <a href="' . route('desas.edit', $desa->desa_id) . '" class="btn btn-sm btn-warning">Edit</a>
                    <form action="' . route('desas.destroy', $desa->desa_id) . '" method="POST" style="display:inline;">
                        ' . csrf_field() . '
                        ' . method_field('DELETE') . '
                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                    </form>';
            });
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Desa $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Desa $model)
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
            ->setTableId('desas-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->dom('Bfrtip')
            ->orderBy(0)
            ->buttons(
                Button::make('create'),
                Button::make('export'),
                Button::make('print'),
                Button::make('reset'),
                Button::make('reload')
            );
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            Column::make('desa_id'),
            Column::make('nama_desa'),
            Column::make('alamat_desa'),
            Column::make('kode_pos'),
            Column::make('telepon'),
            Column::make('email'),
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
        return 'Desa_' . date('YmdHis');
    }
}
