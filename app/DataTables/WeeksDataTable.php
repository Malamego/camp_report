<?php

namespace App\DataTables;

use App\Models\Week;
use Yajra\DataTables\Services\DataTable;

class WeeksDataTable extends DataTable
{
    use BuilderParameters;

    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        return datatables($query)
        ->addColumn('checkbox', '<input type="checkbox" class="selected_data" name="selected_data[]" value="{{ $id }}">')
        ->addColumn('show', 'backend.weeks.buttons.show')
        ->addColumn('edit', 'backend.weeks.buttons.edit')
        ->addColumn('delete', 'backend.weeks.buttons.delete')
        ->rawColumns(['checkbox','show','edit', 'delete'])
        ;
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\ClassModel $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query()
    {
        $query = Week::query()->select('weeks.*');
        return $this->applyScopes($query);
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        $html =  $this->builder()
         ->columns($this->getColumns())
         ->ajax('')
         ->parameters($this->getCustomBuilderParameters([1, 2, 3], [], GetLanguage() == 'ar'));
        return $html;
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
             [
                 'name' => 'checkbox',
                 'data' => 'checkbox',
                 'title' => '<input type="checkbox" class="select-all" onclick="select_all()">',
                 'orderable'      => false,
                 'searchable'     => false,
                 'exportable'     => false,
                 'printable'      => false,
                 'width'          => '10px',
                 'aaSorting'      => 'none'
             ],
             [
                 'name' => "weeks.name",
                 'data'    => 'name',
                 'title'   => trans('main.name'),
                 'searchable' => true,
                 'orderable'  => true,
                 'width'          => '150px',
             ],
             [
                 'name' => "weeks.desc",
                 'data'    => 'desc',
                 'title'   => trans('main.desc'),
                 'searchable' => true,
                 'orderable'  => true,
                 'width'          => '150px',
             ],
             [
                 'name' => "weeks.need",
                 'data'    => 'need',
                 'title'   => trans('main.need'),
                 'searchable' => true,
                 'orderable'  => true,
                 'width'          => '200px',
             ],
             [
                 'name' => 'show',
                 'data' => 'show',
                 'title' => trans('main.show'),
                 'exportable' => false,
                 'printable'  => false,
                 'searchable' => false,
                 'orderable'  => false,
             ],
             [
                 'name' => 'edit',
                 'data' => 'edit',
                 'title' => trans('main.edit'),
                 'exportable' => false,
                 'printable'  => false,
                 'searchable' => false,
                 'orderable'  => false,
             ],
             [
                 'name' => 'delete',
                 'data' => 'delete',
                 'title' => trans('main.delete'),
                 'exportable' => false,
                 'printable'  => false,
                 'searchable' => false,
                 'orderable'  => false,
             ],

         ];
    }

    protected function filename()
    {
        return 'Weeks_' . date('YmdHis');
    }
}
