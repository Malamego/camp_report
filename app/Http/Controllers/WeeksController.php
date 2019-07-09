<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\WeeksRequest;
use App\DataTables\WeeksDataTable;
use App\Models\Week;

class WeeksController extends Controller
{
    private $viewPath = 'backend.weeks';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(WeeksDataTable $dataTable)
    {
        return $dataTable->render("{$this->viewPath}.index", [
          'title' => trans('main.show-all') . ' ' . trans('main.weeks_reports')
      ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("{$this->viewPath}.create", [
          'title' => trans('main.add') . ' ' . trans('main.week_report'),
      ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(WeeksRequest $request)
    {
        $requestAll = $request->all();

        $week =  Week::create($requestAll);

        session()->flash('success', trans('main.added-message'));
        return redirect()->route('weeks.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $week = Week::findOrFail($id);
        return view("{$this->viewPath}.show", [
          'title' => trans('main.show') . ' ' . trans('main.week_report') . ' : ' . $week->name,
          'show' => $week,
      ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $week = Week::findOrFail($id);
        return view("{$this->viewPath}.edit", [
          'title' => trans('main.edit') . ' ' . trans('main.week_report') . ' : ' . $week->name,
          'edit' => $week,
      ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(WeeksRequest $request, $id)
    {
        $week = Week::find($id);
        $week->name = $request->name;
        $week->slug = $request->slug;
        $week->desc = $request->desc;
        $week->need = $request->need;
        $week->save();

        session()->flash('success', trans('main.updated'));
        return redirect()->route('weeks.show', [$week->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @param  bool  $redirect
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, $redirect = true)
    {
        $week = Week::findOrFail($id);

        $week->delete();

        if ($redirect) {
            session()->flash('success', trans('main.deleted-message'));
            return redirect()->route('weeks.index');
        }
    }


    /**
     * Remove the multible resource from storage.
     *
     * @param  array  $data
     * @return \Illuminate\Http\Response
     */
    public function multi_delete(Request $request)
    {
        if (count($request->selected_data)) {
            foreach ($request->selected_data as $id) {
                $this->destroy($id, false);
            }
            session()->flash('success', trans('main.deleted-message'));
            return redirect()->route('weeks.index');
        }
    }
}
