<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Sheet2statisticsRequest;
use App\DataTables\Sheet2statisticsDataTable;
use App\Models\Sheet2statistic;
use App\Models\Week;
use App\Models\Student;
use Hash;
use Helper;

class Sheet2statisticsController extends Controller
{
    private $viewPath = 'backend.sheet2statistics';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Sheet2statisticsDataTable $dataTable)
    {
        return $dataTable->render("{$this->viewPath}.index", [
            'title' => trans('main.show-all') . ' ' . trans('main.sheet2statistics')
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
            'title' => trans('main.add') . ' ' . trans('main.sheet2statistics'),
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
    public function store(Sheet2statisticsRequest $request)
    {
        // To Make Sure my order doesn't duplicate..
        $requestAll = $request->all();

        if (Sheet2statistic::where('datenow', $request->datenow)->exists()) {
            session()->flash('error', trans('main.duplicate_datenow'));
            return redirect()->back();
        }

        $requestAll = $request->all();
        if ($request->file('image')) {
        $requestAll['image'] = Helper::Upload('sheet2statistics', $request->file('image'), 'checkImages');
      }
        $sheet2statis = Sheet2statistic::create($requestAll);

        session()->flash('success', trans('main.added-message'));
        return redirect()->route('sheet2statistics.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $statis = Sheet2statistic::where('id', $id)->with('student_relation')->first();
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
        $statis = Sheet2statistic::findOrFail($id);
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
    public function update(Sheet2statisticsRequest $request, $id)
    {
        $statis = Sheet2statistic::find($id);

        // if (Sheet2statistic::where('id', '!=', $id)->where('course_id', $request->course_id)->where('myorder', $request->myorder)->exists()) {
        //     session()->flash('error', trans('main.ordernumber'));
        //     return redirect()->back();
        // }

        $statis->title            = $request->title;
        $statis->week_id          = $request->week_id;
        $statis->student_id       = $request->student_id;
        $statis->datenow          = $request->datenow;
        $statis->allnet           = $request->allnet;
        $statis->course1          = $request->course1;
        $statis->course2          = $request->course2;
        $statis->course4          = $request->course4;
        $statis->TT               = $request->TT;
        $statis->friends          = $request->friends;
        $statis->status           = $request->status;
        $statis->image            = $request->image;
        $statis->content          = $request->content;

        if ($request->hasFile('image')) {
            $statis->image = Helper::UploadUpdate($statis->image ?? null, 'sheet2statistics', $request->file('image'), 'checkImages');
        }
        $statis->save();

        session()->flash('success', trans('main.updated'));
        return redirect()->route('sheet2statistics.show', [$statis->id]);
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
        $statis = Sheet2statistic::findOrFail($id);
        if (file_exists(public_path('uploads/' . $statis->image))) {
            @unlink(public_path('uploads/' . $statis->image));
        }
        $statis->delete();

        if ($redirect) {
            session()->flash('success', trans('main.deleted-message'));
            return redirect()->route('sheet2statistics.index');
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
            return redirect()->route('sheet2statistics.index');
        }
    }
}
