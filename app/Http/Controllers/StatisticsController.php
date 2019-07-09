<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StatisticsRequest;
use App\DataTables\StatisticsDataTable;
use App\Models\Statistic;
use App\Models\Week;
use App\Models\Student;
use Hash;
use Helper;

class StatisticsController extends Controller
{
    private $viewPath = 'backend.statistics';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(StatisticsDataTable $dataTable)
    {
        return $dataTable->render("{$this->viewPath}.index", [
            'title' => trans('main.show-all') . ' ' . trans('main.statistics')
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
            'title' => trans('main.add') . ' ' . trans('main.statistics'),
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
    public function store(StatisticsRequest $request)
    {
        // To Make Sure my order doesn't duplicate..
        $requestAll = $request->all();

        if (Statistic::where('datenow', $request->datenow)->exists()) {
            session()->flash('error', trans('main.duplicate_datenow'));
            return redirect()->back();
        }

        $requestAll = $request->all();

        $requestAll['image'] = Helper::Upload('statistics', $request->file('image'), 'checkImages');

        $statis = Statistic::create($requestAll);

        session()->flash('success', trans('main.added-message'));
        return redirect()->route('statistics.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $statis = Statistic::where('id', $id)->with('student_relation')->first();
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
        $statis = Statistic::findOrFail($id);
        $we    = Week::all();
        $st    = Student::all();
        return view("{$this->viewPath}.edit", [
            'title' => trans('main.edit') . ' ' . trans('main.statis') . ' : ' . $statis->name,
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
    public function update(StatisticsRequest $request, $id)
    {
        $statis = Statistic::find($id);

        // if (Statistic::where('id', '!=', $id)->where('course_id', $request->course_id)->where('myorder', $request->myorder)->exists()) {
        //     session()->flash('error', trans('main.ordernumber'));
        //     return redirect()->back();
        // }

        $statis->title            = $request->title;
        $statis->week_id          = $request->week_id;
        $statis->student_id       = $request->student_id;
        $statis->datenow          = $request->datenow;
        $statis->mission          = $request->mission;
        $statis->decision         = $request->decision;
        $statis->ob1              = $request->ob1;
        $statis->ob2              = $request->ob2;
        $statis->ob3              = $request->ob3;
        $statis->ob4              = $request->ob4;
        $statis->ob5              = $request->ob5;
        $statis->ob6              = $request->ob6;
        $statis->papers           = $request->papers;
        $statis->stu_num          = $request->stu_num;
        $statis->holy_spirit      = $request->holy_spirit;
        $statis->mission_no_student = $request->mission_no_student;
        $statis->mission_all      = $request->mission_all;
        $statis->status           = $request->status;
        $statis->image            = $request->image;
        $statis->content          = $request->content;

        if ($request->hasFile('image')) {
            $statis->image = Helper::UploadUpdate($statis->image ?? null, 'statistics', $request->file('image'), 'checkImages');
        }
        $statis->save();

        session()->flash('success', trans('main.updated'));
        return redirect()->route('statistics.show', [$statis->id]);
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
        $statis = Statistic::findOrFail($id);
        if (file_exists(public_path('uploads/' . $statis->image))) {
            @unlink(public_path('uploads/' . $statis->image));
        }
        $statis->delete();

        if ($redirect) {
            session()->flash('success', trans('main.deleted-message'));
            return redirect()->route('statistics.index');
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
            return redirect()->route('statistics.index');
        }
    }
}
