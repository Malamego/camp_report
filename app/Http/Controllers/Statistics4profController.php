<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Statistics4profRequest;
use App\DataTables\Statistic4profDataTable;
use App\Models\Statistic4prof;
use App\Models\Week;
use App\Models\Student;
use Hash;
use Helper;

class Statistics4profController extends Controller
{
    private $viewPath = 'backend.statistics4prof';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Statistic4profDataTable $dataTable)
    {
        return $dataTable->render("{$this->viewPath}.index", [
            'title' => trans('main.show-all') . ' ' . trans('main.statis4prof')
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $we = Week::all();
        $st = Student::all();
        return view("{$this->viewPath}.create", [
            'title' => trans('main.add') . ' ' . trans('main.statis4prof'),
            'we' => $we,
            'st' => $st,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Statistics4profRequest $request)
    {
        $requestAll = $request->all();

        if ($request->file('image')) {
          $requestAll['image'] = Helper::Upload('statistics4prof', $request->file('image'), 'checkImages');
        }

        $statis = Statistic4prof::create($requestAll);

        session()->flash('success', trans('main.added-message'));
        return redirect()->route('statistics4prof.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $statis = Statistic4prof::where('id', $id)->with('studentprof_relation')->first();
        return view("{$this->viewPath}.show", [
            'title' => trans('main.show') . ' ' . trans('main.statis') . ' : ' . $statis->name,
            'show' => $statis,
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
        $statis = Statistic4prof::findOrFail($id);
        $we     = Week::all();
        $st     = Student::all();
        return view("{$this->viewPath}.edit", [
            'title' => trans('main.edit') . ' ' . trans('main.status') . ' : ' . $statis->name,
            'edit' => $statis,
            'we' => $we,
            'st' => $st,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Statistics4profRequest $request, $id)
    {
        $statis = Statistic4prof::find($id);

        $statis->name             = $request->name;
        $statis->student_id       = $request->student_id;
        $statis->week_id          = $request->week_id;
        $statis->datenow          = $request->datenow;
        $statis->content          = $request->content;
        $statis->mission          = $request->mission;
        $statis->decision         = $request->decision;
        $statis->ob1              = $request->ob1;
        $statis->ob2              = $request->ob2;
        $statis->ob3              = $request->ob3;
        $statis->ob4              = $request->ob4;
        $statis->ob5              = $request->ob5;
        $statis->ob6              = $request->ob6;
        $statis->level1           = $request->level1;
        $statis->level2           = $request->level2;
        $statis->level3           = $request->level3;
        $statis->level4           = $request->level4;
        $statis->tot              = $request->tot;
        $statis->friendmission    = $request->friendmission;
        $statis->frienddecision   = $request->frienddecision;
        $statis->friendfollow     = $request->friendfollow;
        $statis->status           = $request->status;
        $statis->talmazagroup     = $request->talmazagroup;
        $statis->missionhours     = $request->missionhours;
        $statis->jesustime        = $request->jesustime;
        $statis->church           = $request->church;
        $statis->traininteract    = $request->traininteract;
        $statis->loven            = $request->loven;

        if ($request->hasFile('image')) {
            $statis->image = Helper::UploadUpdate($statis->image ?? null, 'statistics4prof', $request->file('image'), 'checkImages');
        }
        $statis->save();

        session()->flash('success', trans('main.updated'));
        return redirect()->route('statistics4prof.show', [$statis->id]);
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
        $statis = Statistic4prof::findOrFail($id);
        if (file_exists(public_path('uploads/' . $statis->image))) {
            @unlink(public_path('uploads/' . $statis->image));
        }
        $statis->delete();

        if ($redirect) {
            session()->flash('success', trans('main.deleted-message'));
            return redirect()->route('statistics4prof.index');
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
            return redirect()->route('statistics4prof.index');
        }
    }
}
