<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ToolsRequest;
use App\DataTables\ToolsDataTable;
use App\Models\Tool;

class ToolsController extends Controller
{
    private $viewPath = 'backend.tools';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ToolsDataTable $dataTable)
    {
        return $dataTable->render("{$this->viewPath}.index", [
          'title' => trans('main.show-all') . ' ' . trans('main.tools')
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
          'title' => trans('main.add') . ' ' . trans('main.tools'),
      ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ToolsRequest $request)
    {
        $requestAll = $request->all();

        $tool =  Tool::create($requestAll);

        session()->flash('success', trans('main.added-message'));
        return redirect()->route('tools.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tool = Tool::findOrFail($id);
        return view("{$this->viewPath}.show", [
          'title' => trans('main.show') . ' ' . trans('main.tool') . ' : ' . $tool->name,
          'show' => $tool,
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
        $tool = Tool::findOrFail($id);
        return view("{$this->viewPath}.edit", [
          'title' => trans('main.edit') . ' ' . trans('main.tool') . ' : ' . $tool->name,
          'edit' => $tool,
      ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ToolsRequest $request, $id)
    {
        $tool = Tool::find($id);
        $tool->name = $request->name;
        $tool->slug = $request->slug;
        $tool->save();

        session()->flash('success', trans('main.updated'));
        return redirect()->route('tools.show', [$tool->id]);
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
        $tool = Tool::findOrFail($id);

        $tool->delete();

        if ($redirect) {
            session()->flash('success', trans('main.deleted-message'));
            return redirect()->route('tools.index');
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
            return redirect()->route('tools.index');
        }
    }
}
