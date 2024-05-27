<?php

namespace App\Http\Controllers;

use App\Models\course;
use App\Models\faculty;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class facultycontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $course_faculty=DB::table('courses')
        ->join('faculties','faculties.course_id','=','courses.id')
        ->select('*')
        ->get();
        // echo"<pre>";
        // print_r($course_faculty);
        // exit();
        $course=course::all();
        return view('admin.faculty',compact('course','course_faculty'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $course=course::all();
        return view('admin.faculty_add',compact('course'));
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
                'faculty_name'=>'required',
                'faculty_mobileno'=>'required|regex:"^[6-9]\d{9}$"',
                'faculty_city'=>'required',
                'faculty_image'=>'required',
            ],
            [
                'course_id.required'=>'Select Course ID',
                'faculty_name.required'=>'Select Faculty Name',
                'faculty_mobileno.regex'=>' Enter Valid Mobile No',
                'faculty_city.required'=>'Enter City',
                'faculty_image.required'=>'Upload Image',
            ],
        );
        $destinationpath='./assets/images';
        $course_id=$request->get('course_id');
        $faculty_name=$request->get('faculty_name');
        $faculty_mobileno=$request->get('faculty_mobileno');
        $file=$request->file('faculty_image');
        $faculty_city=$request->get('faculty_city');
        $filename=$file->getClientOriginalName();
        $data=new faculty([
            "course_id"=>$course_id,
            "faculty_name"=>$faculty_name,
            "faculty_image"=>$filename,
            "faculty_mobileno"=>$faculty_mobileno,
            "faculty_city"=>$faculty_city,
        ]);
        $faculty_name=DB::table('faculties')
        ->where('faculty_name','=',$faculty_name)
        ->count();
        if($faculty_name==1)
        {
            return redirect()->back()->with('message','Faculty Already Exit');
        }
        else
        {
            if($data->save())
            {
                $file->move($destinationpath,$filename);
                return redirect('faculty')->with('message','Faculty Added Successfully');
            }
        }
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
        $course=course::all();
        $faculty=faculty::find($id);
        return view('admin.faculty_edit',compact('course','faculty'));
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
                'faculty_name'=>'required',
                'faculty_mobileno'=>'required|regex:"^[6-9]\d{9}$"',
                'faculty_city'=>'required',
                // 'faculty_image'=>'required',
            ],
            [
                'course_id.required'=>'Select Course ID',
                'faculty_name.required'=>'Select Faculty Name',
                'faculty_mobileno.regex'=>' Enter Valid Mobile No',
                'faculty_city.required'=>'Enter City',
                // 'faculty_image.required'=>'Upload Image',
            ],
        );
        $destinationpath='./assets/images';
        $course_id=$request->get('course_id');
        $faculty_name=$request->get('faculty_name');
        $faculty_mobileno=$request->get('faculty_mobileno');
        $file=$request->file('faculty_image');
        $faculty_city=$request->get('faculty_city');
        $data=faculty::find($id);
        $data->course_id=$course_id;
        $data->faculty_name=$faculty_name;
        $data->faculty_mobileno=$faculty_mobileno;
        $data->faculty_city=$faculty_city;
        if($file!='')
        {
            $filename=$file->getClientOriginalName();
            $file->move($destinationpath,$filename);
            $data->faculty_image=$filename;
        }
        $data->update();
        return redirect('faculty')->with('message','Faculty Updated Successfully');   
    }   

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $data=faculty::find($id);
        $data->delete();
            return redirect()->back()->with('message','Faculty Deleted Successfully');
    }
}
