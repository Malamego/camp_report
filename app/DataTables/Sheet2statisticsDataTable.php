<?php

namespace App\DataTables;

use App\Models\Sheet2statistic;
use Yajra\DataTables\Services\DataTable;

class Sheet2statisticsDataTable extends DataTable
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
        ->addColumn('show', 'backend.sheet2statistics.buttons.show')
        ->addColumn('edit', 'backend.sheet2statistics.buttons.edit')
        ->addColumn('delete', 'backend.sheet2statistics.buttons.delete')
        ->rawColumns(['checkbox','show','edit', 'delete'])
        ;
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Statistic $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query()
    {
        $query = Sheet2statistic::query()->with('student_relation')->select('sheet2statistics.*');
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
         ->parameters($this->getCustomBuilderParameters([1], [], GetLanguage() == 'ar'));

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
                 'name' => "student_relation.name",
                 'data'    => 'student_relation.name',
                 'title'   => trans('main.teacher'),
                 'searchable' => true,
                 'orderable'  => true,
                 'width'          => '100px',
             ],
             [
                 'name' => "sheet2statistics.title",
                 'data'    => 'title',
                 'title'   => trans('main.title'),
                 'searchable' => true,
                 'orderable'  => true,
                 'width'          => '50px',
             ],
             [
                 'name' => "sheet2statistics.allnet",
                 'data'    => 'allnet',
                 'title'   => trans('main.allnet'),
                 'searchable' => true,
                 'orderable'  => true,
                 'width'          => '70px',
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
        return 'Sheet2statistics_' . date('YmdHis');
    }
}
