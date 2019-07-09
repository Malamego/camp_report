<?php

namespace App\DataTables;

use App\Models\Statistic;
use Yajra\DataTables\Services\DataTable;

class StatisticsDataTable extends DataTable
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
        ->addColumn('show', 'backend.statistics.buttons.show')
        ->addColumn('edit', 'backend.statistics.buttons.edit')
        ->addColumn('delete', 'backend.statistics.buttons.delete')
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
        $query = Statistic::query()->with('student_relation')->select('statistics.*');
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
             // [
             //     'name' => "statistics.title",
             //     'data'    => 'title',
             //     'title'   => trans('main.title'),
             //     'searchable' => true,
             //     'orderable'  => true,
             //     'width'          => '100px',
             // ],
             [
                 'name' => "statistics.mission",
                 'data'    => 'mission',
                 'title'   => trans('main.mission'),
                 'searchable' => true,
                 'orderable'  => true,
                 'width'          => '1px',
             ],
             [
                 'name' => "statistics.decision",
                 'data'    => 'decision',
                 'title'   => trans('main.decision'),
                 'searchable' => true,
                 'orderable'  => true,
                 'width'          => '1px',
             ],
             // [
             //     'name' => "statistics.ob1",
             //     'data'    => 'ob1',
             //     'title'   => trans('main.observation1'),
             //     'searchable' => true,
             //     'orderable'  => true,
             //     'width'          => '1px',
             // ],
             // [
             //     'name' => "statistics.ob2",
             //     'data'    => 'ob2',
             //     'title'   => trans('main.observation2'),
             //     'searchable' => true,
             //     'orderable'  => true,
             //     'width'          => '1px',
             // ],
             // [
             //     'name' => "statistics.ob3",
             //     'data'    => 'ob3',
             //     'title'   => trans('main.observation3'),
             //     'searchable' => true,
             //     'orderable'  => true,
             //     'width'          => '1px',
             // ],
             // [
             //     'name' => "statistics.ob4",
             //     'data'    => 'ob4',
             //     'title'   => trans('main.observation4'),
             //     'searchable' => true,
             //     'orderable'  => true,
             //     'width'          => '1px',
             // ],
             // [
             //     'name' => "statistics.ob5",
             //     'data'    => 'ob5',
             //     'title'   => trans('main.observation5'),
             //     'searchable' => true,
             //     'orderable'  => true,
             //     'width'          => '1px',
             // ],
             // [
             //     'name' => "statistics.ob6",
             //     'data'    => 'ob6',
             //     'title'   => trans('main.observation6'),
             //     'searchable' => true,
             //     'orderable'  => true,
             //     'width'          => '1px',
             // ],

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
        return 'Statistics_' . date('YmdHis');
    }
}
