<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\course_add;
use App\Models\course;
use App\Models\studentdata;

class course_addscontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data = DB::table('courses')
            ->join('course_adds', 'courses.id', '=', 'course_adds.course_id')
            ->join('studentdatas', 'studentdatas.id', '=', 'course_adds.student_id')
            ->select('*', 'course_adds.id as course_adds_id')
            ->get();
        $student = studentdata::all();
        

        // echo"<pre>";
        // print_r($data);
        // exit();
        return view('admin.show_student', compact('data', 'student'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        $data = DB::table('courses')
            ->join('course_adds', 'courses.id', '=', 'course_adds.course_id')
            ->join('studentdatas', 'studentdatas.id', '=', 'course_adds.student_id')
            ->select('*', 'course_adds.id as course_adds_id')
            ->where('course_adds.id', '=', $id)
            ->first();
        // echo"<pre>";
        // print_r($data);
        // exit();
        return view('admin.show_student_edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $status = $request->get('status');
        $data = course_add::find($id);
        $data->status = $status;
        $data->update();
        return redirect('course_request')->with('message', 'Enroll Course is Updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $data = course_add::find($id);
        $data->delete();
        return redirect()->back()->with('message', 'Enroll Course is Deleted Successfully');
    }
}
