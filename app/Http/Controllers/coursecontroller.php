<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Models\course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class coursecontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $category_courses=DB::table('categories')
        ->join('courses','courses.category_id','=','categories.id')
        ->select('*')
        ->get();
                    // echo"<pre>";
                    // print_r($category_courses);
                    // exit();

        // $category=category::all();
        
        return view('admin.course',compact('category_courses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $category=category::all();
        return view('admin.course_add',compact('category'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //

        $request->validate(
            [
                'category_id'=>'required',
                'course_name'=>'required',
                'course_duration'=>'required',
                'course_status'=>'required',
                'total_fee'=>'required',
                'course_mode'=>'required',
                'course_image'=>'required',
                'summernote_content'=>'required',
                'shortdesc'=>'required',
            ],
            [
                'category_id.required'=>' Select the Category',
                'course_name.required'=>'Enter Course Name',
                'course_duration.required'=>' Select the Course Duration',
                'course_status.required'=>' Choose the Course Status',
                'total_fee.required'=>' Select the Total Fees',
                'course_mode.required'=>' Choose the course mode',
                'course_image.required'=>' Select the image',
                'shortdesc.required'=>'Enter short Description',
                'summernote_content'=>'Enter Long Description',
            ]
        );
       
        $category_id=$request->get('category_id');
        $course_name=$request->get('course_name');
        $course_duration=$request->get('course_duration');
        $course_status=$request->get('course_status');
        $total_fee=$request->get('total_fee');
        $course_mode=$request->get('course_mode');
        $file=$request->file('course_image');
        $filename=$file->getClientOriginalName();
        $destinationpath='./assets/images';

        $shortdesc=$request->get('shortdesc');
        $longdesc=$request->get('summernote_content');

        $data=new course([
            "category_id"=>$category_id,
            "course_name"=>$course_name,
            "course_duration"=>$course_duration,
            "course_mode"=>$course_mode,
            "course_status"=>$course_status,
            "course_image"=>$filename,
            "total_fees"=>$total_fee,
            "shortdesc"=>$shortdesc,
            "longdesc"=>$longdesc
        ]);
        $course_fetch=DB::table('courses')
        ->where('course_name','=',$course_name)
        ->count();
        if($course_fetch==1)
        {
            return redirect()->back()->with('message','Course Already Exits');
        }
        else
        {
            if($data->save())
            {
                $file->move($destinationpath,$filename);
                return redirect('course')->with('message','Course Added Successfully');
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
        $category=category::all();
        $course=course::find($id);
        return view('admin.course_edit',compact('category','course'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $request->validate(
            [
                'category_id'=>'required',
                'course_name'=>'required',
                'course_duration'=>'required',
                'course_status'=>'required',
                'total_fee'=>'required',
                'course_mode'=>'required',
                'shortdesc'=>'required',
                // 'longdesc'=>'required',
                // 'course_image'=>'required',
            ],
            [
                'category_id.required'=>' Select the Category',
                'course_name.required'=>'Enter Course Name',
                'course_duration.required'=>' Select the Course Duration',
                'course_status.required'=>' Choose the Course Status',
                'total_fee.required'=>' Select the Total Fees',
                'course_mode.required'=>' Choose the course mode',
                'shortdesc.required'=>'Enter Short Description',
                // 'longdesc.required'=>'Enter Long Description',
            ]
        );
        $category_id=$request->get('category_id');
        $course_name=$request->get('course_name');
        $course_duration=$request->get('course_duration');
        $course_status=$request->get('course_status');
        $total_fees=$request->get('total_fee');
        $course_mode=$request->get('course_mode');
        $shortdesc=$request->get('shortdesc');
        $longdesc=$request->get('summernote_content');
        $file=$request->file('course_image');
        $destinationpath='./assets/images';
        $data=course::find($id);
        $data->category_id=$category_id;
        $data->course_name=$course_name;
        $data->course_duration=$course_duration;
        $data->course_status=$course_status;
        $data->total_fees=$total_fees;
        $data->course_mode=$course_mode;
        $data->shortdesc=$shortdesc;
        $data->longdesc=$longdesc;
        if($file!='')
        {
            $filename=$file->getClientOriginalName();
            $file->move($destinationpath,$filename);
            $data->course_image=$filename;
        }
        if($data->update())
        {
            return redirect('course')->with('message','Course Updated Successfully');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $data=course::find($id);
        $data->delete();
            return redirect('course')->with('message','Course Deleted Successfully');
       
    }
}
