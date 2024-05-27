<?php

namespace App\Http\Controllers;

use App\Models\batch;
use App\Models\course;
use Dflydev\DotAccessData\Data;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class batchcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $course_batch=DB::table('courses')
        ->join('batches','batches.course_id','=','courses.id')
        ->select('*')
        ->get();
        $course=course::all();
        return view('admin.batch',compact('course','course_batch'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $course=course::all();
        return view('admin.batch_add',compact('course'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate(
            [
                'course_id'=>'required',
                'batch_time'=>'required',
            ],
            [
                'course_id.required'=>'Select the Course',
                'batch_time.required'=>'Select the Batch Time',
            ]
        );
        $course_id=$request->get('course_id');
        $batch_time=$request->get('batch_time');
        $batch_time=date('h:i:A',strtotime($batch_time));

        $data=new batch([
            'course_id'=>$course_id,
            'batch_time'=>$batch_time,
        ]);
        $batch_fetch=DB::table('batches')
        ->where('course_id','=',$course_id )
        ->where('batch_time','=',$batch_time)
        ->count();
     
        if($batch_fetch==1)
        {
            return redirect()->back()->with('message','batch time is already Exits for this Courses');
        }
        $data->save();
        return redirect()->back()->with('message','Batch Added Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $batch=batch::find($id);
        $course=course::all();
        return view('admin.batch_edit',compact('batch','course'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $request->validate(
            [
                'course_id'=>'required',
                'batch_time'=>'required',
            ],
            [
                'course_id.required'=>'Select the Course',
                'batch_time.required'=>'Select the Batch Time',
            ]
        );
        $course_id=$request->get('course_id');
        $batch_time=$request->get('batch_time');
        $batch_timeing=date('h:i:A',strtotime($batch_time));
        $data=batch::find($id);
        $data->course_id=$course_id;
        $data->batch_time=$batch_timeing;

        $data->update();
        return redirect('batch')->with('message','Batch Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $data=batch::find($id);
        $data->delete();
        return redirect()->back()->with('message','Batch Deleted Successfully');

    }
}
