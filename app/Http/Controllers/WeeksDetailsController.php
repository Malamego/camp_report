<?php
namespace App\Http\Controllers;

use App\DataTables\WeeksDetailsDataTable;
use App\Models\WeeksDetail;
use App\Models\ClassModel;
use App\Models\Week;
use App\Http\Requests\Weeks_DetailsRequest;
use Illuminate\Http\Request;

class WeeksDetailsController extends Controller
{
    private $viewPath = 'backend.weeks_details';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(WeeksDetailsDataTable $dataTable)
    {
        return $dataTable->render("{$this->viewPath}.index", [
          'title' => trans('main.show-all') . ' ' . trans('main.week_details')
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
        $we = Week::all();
        return view("{$this->viewPath}.create", [
          'title' => trans('main.add') . ' ' . trans('main.week_details'),
          'cls' => $cls,
          'we' => $we,
      ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Weeks_DetailsRequest $request)
    {

        $requestAll = $request->all();
        if (WeeksDetail::where('startdate', $requestAll['startdate'])->where('class_id', $requestAll['class_id'])->exists()) {
            session()->flash('error', trans('main.week_details_showdate_unique'));
            return redirect()->back()->withInput();
        }

        $week_details =  WeeksDetail::create($requestAll);

        session()->flash('success', trans('main.added-message'));
        return redirect()->route('weeks_details.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $week_details = WeeksDetail::findOrFail($id);
        return view("{$this->viewPath}.show", [
          'title' => trans('main.show') . ' ' . trans('main.week_details') . ' : ' . $week_details->week_id,
          'show' => $week_details,
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
        $week_details = WeeksDetail::findOrFail($id);
        $cls = ClassModel::all();
        $we = Week::all();
        return view("{$this->viewPath}.edit", [
          'title' => trans('main.edit') . ' ' . trans('main.week_details') . ' : ' . $week_details->week_id,
          'edit' => $week_details,
          'we' => $we,
          'cls' => $cls,
      ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Weeks_DetailsRequest $request, $id)
    {
        $week_details = WeeksDetail::find($id);

        if (WeeksDetail::where('id', '!=', $id)->where('startdate', $request['startdate'])->where('class_id', $request['class_id'])->exists()) {
            session()->flash('error', trans('main.week_details_showdate_unique'));
            return redirect()->back()->withInput();
        }

        $week_details->week_id = $request->week_id;
        $week_details->class_id = $request->class_id;
        $week_details->status = $request->status;
        $week_details->startdate = $request->startdate;
        $week_details->enddate = $request->enddate;
        $week_details->save();

        session()->flash('success', trans('main.updated'));
        return redirect()->route('weeks_details.show', [$week_details->id]);
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
        $week_details = WeeksDetail::findOrFail($id);

        $week_details->delete();

        if ($redirect) {
            session()->flash('success', trans('main.deleted-message'));
            return redirect()->route('weeks_details.index');
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
            return redirect()->route('weeks_details.index');
        }
    }
}
