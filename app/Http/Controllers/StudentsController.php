<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StudentsRequest;
use App\DataTables\StudentsDataTable;
use App\Models\Student;
use App\Models\User;
use App\Models\ClassModel;
use Helper;

class StudentsController extends Controller
{
    private $viewPath = 'backend.students';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(StudentsDataTable $dataTable)
    {
        return $dataTable->render("{$this->viewPath}.index", [
            'title' => trans('main.show-all') . ' ' . trans('main.students')
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cls = ClassModel::all();
        $us = User::all();
        return view("{$this->viewPath}.create", [
            'title' => trans('main.add') . ' ' . trans('main.students'),
            'cls' => $cls,
            'us' => $us,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StudentsRequest $request)
    {
        $requestAll = $request->all();

        $requestAll['image'] = Helper::Upload('students', $request->file('image'), 'checkImages');

        $student = Student::create($requestAll);

        session()->flash('success', trans('main.added-message'));
        return redirect()->route('students.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $student = Student::where('id', $id)->with('class_relation')->first();
        // student = Student::findOrFail($id);
        return view("{$this->viewPath}.show", [
            'title' => trans('main.show') . ' ' . trans('main.student') . ' : ' . $student->name,
            'show' => $student,
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
        $cls  = ClassModel::all();
        $us  = User::all();
        $student = Student::findOrFail($id);
        return view("{$this->viewPath}.edit", [
            'title' => trans('main.edit') . ' ' . trans('main.student') . ' : ' . $student->name,
            'edit' => $student,
            'us' => $us,
            'cls' => $cls,
            // 'roles' => Role::get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StudentsRequest $request, $id)
    {
        $student = Student::find($id);
        $student->name = $request->name;
        $student->email = $request->email;

        if ($request->has('password') && !empty($request->password) && !is_null($request->password)) {
            $student->password = Hash::make($request->password);
        }
        $student->phone = $request->phone;
        $student->imei = $request->imei;
        $student->class_id = $request->class_id;
        $student->user_id = $request->user_id;

        if ($request->hasFile('image')) {
            $student->image = Helper::UploadUpdate($student->image ?? null, 'students', $request->file('image'), 'checkImages');
        }
        $student->save();        

        session()->flash('success', trans('main.updated'));
        return redirect()->route('students.show', [$student->id]);
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
        $student = Student::findOrFail($id);
        if (file_exists(public_path('uploads/' . $student->image))) {
            @unlink(public_path('uploads/' . $student->image));
        }
        $student->delete();

        if ($redirect) {
            session()->flash('success', trans('main.deleted-message'));
            return redirect()->route('students.index');
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
            return redirect()->route('students.index');
        }
    }
}
