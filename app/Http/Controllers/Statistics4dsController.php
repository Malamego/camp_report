<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Statistics4dsRequest;
use App\DataTables\Statistic4dsDataTable;
use App\Models\Statistic4ds;
use App\Models\Week;
use App\Models\Student;
use App\Models\Tool;
use Hash;
use Helper;

class Statistics4dsController extends Controller
{
    private $viewPath = 'backend.statistics4ds';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Statistic4dsDataTable $dataTable)
    {
        return $dataTable->render("{$this->viewPath}.index", [
            'title' => trans('main.show-all') . ' ' . trans('main.statis4ds')
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
        $tool = Tool::all();
        return view("{$this->viewPath}.create", [
            'title' => trans('main.add') . ' ' . trans('main.statis4ds'),
            'we' => $we,
            'st' => $st,
            'tool' => $tool,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Statistics4dsRequest $request)
    {
        $requestAll = $request->all();

        if ($request->file('image')) {
          $requestAll['image'] = Helper::Upload('statistics4ds', $request->file('image'), 'checkImages');
        }


        $statis = Statistic4ds::create($requestAll);

        session()->flash('success', trans('main.added-message'));
        return redirect()->route('statistics4ds.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $statis = Statistic4ds::where('id', $id)->with('studentds_relation')->first();
        return view("{$this->viewPath}.show", [
            'title' => trans('main.show') . ' ' . trans('main.statis') . ' : ' . $statis->title,
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
        $statis = Statistic4ds::findOrFail($id);
        $we     = Week::all();
        $st     = Student::all();
        $tool   = Tool::all();
        return view("{$this->viewPath}.edit", [
            'title' => trans('main.edit') . ' ' . trans('main.statis') . ' : ' . $statis->name,
            'edit' => $statis,
            'we' => $we,
            'st' => $st,
            'tool' => $tool,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Statistics4dsRequest $request, $id)
    {
        $statis = Statistic4ds::find($id);

        $statis->title            = $request->title;
        $statis->week_id          = $request->week_id;
        $statis->student_id       = $request->student_id;
        $statis->tool_id          = $request->tool_id;
        $statis->content          = $request->content;
        $statis->datenow          = $request->datenow;
        $statis->interact         = $request->interact;
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
        $statis->pool             = $request->pool;
        $statis->story            = $request->story;
        $statis->status           = $request->status;
        $statis->image            = $request->image;
        $statis->content          = $request->content;
        $statis->incarnation      = $request->incarnation;
        $statis->steel            = $request->steel;
        $statis->misrepresentation = $request->misrepresentation;
        $statis->biblestory       = $request->biblestory;
        $statis->lesson1          = $request->lesson1;
        $statis->lesson2          = $request->lesson2;
        $statis->lesson3          = $request->lesson3;
        $statis->lesson4          = $request->lesson4;
        $statis->lesson5          = $request->lesson5;
        $statis->lesson6          = $request->lesson6;
        $statis->lesson7          = $request->lesson7;
        $statis->lesson8          = $request->lesson8;
        $statis->lesson9          = $request->lesson9;
        $statis->lesson10         = $request->lesson10;
        $statis->friendmission    = $request->friendmission;
        $statis->frienddecision   = $request->frienddecision;
        $statis->friendmissiontrain   = $request->friendmissiontrain;
        $statis->loven            = $request->loven;

        if ($request->hasFile('image')) {
            $statis->image = Helper::UploadUpdate($statis->image ?? null, 'statistics4ds', $request->file('image'), 'checkImages');
        }
        $statis->save();

        session()->flash('success', trans('main.updated'));
        return redirect()->route('statistics4ds.show', [$statis->id]);
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
        $statis = Statistic4ds::findOrFail($id);
        if (file_exists(public_path('uploads/' . $statis->image))) {
            @unlink(public_path('uploads/' . $statis->image));
        }
        $statis->delete();

        if ($redirect) {
            session()->flash('success', trans('main.deleted-message'));
            return redirect()->route('statistics4ds.index');
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
            return redirect()->route('statistics4ds.index');
        }
    }
}
