<?php

namespace App\DataTables;

use App\Models\Student;
use Yajra\DataTables\Services\DataTable;

class StudentsDataTable extends DataTable
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
      ->addColumn('show', 'backend.students.buttons.show')
      ->addColumn('edit', 'backend.students.buttons.edit')
      ->addColumn('delete', 'backend.students.buttons.delete')
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
        $query = Student::query()->with('class_relation')->select('students.*');
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
        ->parameters($this->getCustomBuilderParameters([1, 2, 3, 4], [], GetLanguage() == 'ar'));

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
                'name' => "students.name",
                'data'    => 'name',
                'title'   => trans('main.name'),
                'searchable' => true,
                'orderable'  => true,
                'width'          => '200px',
            ],
            [
                'name' => "students.phone",
                'data'    => 'phone',
                'title'   => trans('main.phone'),
                'searchable' => true,
                'orderable'  => true,
                'width'          => '100px',
            ],
            // [
            //     'name' => "class_relation.name",
            //     'data'    => 'class_relation.name',
            //     'title'   => trans('main.class'),
            //     'searchable' => true,
            //     'orderable'  => true,
            //     'width'          => '200px',
            // ],
            [
                'name' => "students.email",
                'data'    => 'email',
                'title'   => trans('main.email'),
                'searchable' => true,
                'orderable'  => true,
                'width'          => '100px',
            ],
            // [
            //     'name' => "user_relation.name",
            //     'data'    => 'user_relation.name',
            //     'title'   => trans('main.teacher'),
            //     'searchable' => true,
            //     'orderable'  => true,
            //     'width'          => '100px',
            // ],
            [
                'name' => "students.score",
                'data'    => 'score',
                'title'   => trans('main.score'),
                'searchable' => true,
                'orderable'  => true,
                'width'          => '100px',
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
        return 'Students_' . date('YmdHis');
    }
}
