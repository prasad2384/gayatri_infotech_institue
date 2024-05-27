<?php

namespace App\Http\Controllers;

use App\Models\batch;
use App\Models\contact;
use App\Models\course;
use App\Models\course_add;
use App\Models\fees_structure;
use App\Models\register;
use App\Models\studentdata;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Carbon;

class admincontroller extends Controller
{
    //
    public function loginprocess(Request $request)
    {

        $request->validate(
            [
                'email' => 'required',
                'password' => 'required',
            ],
            [
                'email.required' => 'Enter Valid Email Address ',
                'password.required' => 'Enter Valid Password'
            ],
        );
        $email = $request->get('email');
        $password = $request->get('password');
        $check = DB::table('registers')
            ->where('email', '=', $email)
            ->select('*')
            ->first();
        if ($check == '') {
            echo "<script>alert('Your Account Not Found');
            window.location.href='admin_login';</script>";
        } else {
            if ($password == $check->password && $email == $check->email) {
                $request->session()->put('admin_username', $check->email);
                return redirect('admin');
            } else {
                echo "<script>alert('Your Account Not Found');
                window.location.href='admin_login';</script>";
                // return redirect()->back()->with('warning','Your Account Not Found');

                // return redirect('login');
            }
        }
    }
    public function logoutprocess()
    {
        // echo"<script>alert('hi');</script>";
        // exit();
        // session()->flush();
        session()->forget('admin_username');
        return redirect('admin_login');
    }
    public function studentregister()
    {
        $student = studentdata::all();
        return view('admin.student', compact('student'));
    }
    public function studentdeletefun(string $id)
    {
        // echo $id;
        $data = studentdata::find($id);
        $data->delete();
        DB::table('fees_structures')->where('student_id', $id)->delete();
        DB::table('course_adds')->where('student_id', $id)->delete();
        return redirect()->back()->with('message', 'Student Deleted Successfully');
    }
    public function fees()
    {
        $student_fetch = studentdata::all();
        return view('admin.add_fees', compact('student_fetch'));
    }
    public function fetchcourses($id)
    {
        $course = DB::table('course_adds')
            ->join("courses", "courses.id", "=", "course_adds.course_id")
            ->where('student_id', '=', $id)
            ->where('course_adds.status', '=', 'active')
            // ->count();
            ->select('*')
            ->get();
        return response()->json($course);
    }
    public function paidfee(Request $request, $id)
    {
        // echo "<script>alert($id);</script>";
        // exit();
        $fetch_fees = DB::table('fees_structures')->where('student_id', '=', $id)->first();
        // echo "<script>alert($fetch_fees->paid_fees);</script>";
        // exit();

        $paid_fees = $request->get('paid_fees');
        $data = fees_structure::find($fetch_fees->id);
        $data->paid_fees = $fetch_fees->paid_fees + $paid_fees;
        $data->update();
        return redirect()->back()->with('message', 'Fee Added Successfully');
    }
    public function showfees($id)
    {
        $student_fees = DB::table('fees_structures')->select('paid_fees')->where('student_id', '=', $id)->first();
        return response()->json($student_fees);
    }
    public function fetchfees()
    {
        $student_data = studentdata::all();
        return view('admin.student_details', compact('student_data'));
    }
    public function applycoursefetchs($id)
    {
        $data = DB::table('courses')
            ->join('course_adds', 'courses.id', '=', 'course_adds.course_id')
            ->join('studentdatas', 'studentdatas.id', '=', 'course_adds.student_id')
            ->where('student_id', '=', $id)->select('*')
            ->get();
        // $data=DB::table('course_adds')
        // ->join('courses','courses.id','=','course_adds.course_id')
        // ->where('student_id','=',$id)->select('*')->get();
        // print_r($data);
        // exit();
        return response($data);
    }
    public function showcontacts()
    {
        $contact = contact::all();
        return view('admin.showcontact', compact('contact'));
    }
    public function deletecontacts(string $id)
    {
        $data = contact::find($id);
        $data->delete();
        return redirect()->back()->with('message', 'Contact Deleted Successfully');
    }
    public function fetchbatchtimes(string $id)
    {
        $data = DB::table('batches')->where('batches.course_id', '=', $id)->select('*')->get();
        return response($data);
    }
    public function activebatchs(Request $request)
    {
        //    echo "activebatch";
        $currentDateFormatted = Carbon::now()->format('Y-m-d');
        $batch_time = $request->get('batch_time');
        $data = DB::table('course_adds')->where('student_id', '=', $request->get('id'))->where('course_id', '=', $request->get('cid'))->select('*')->first();
        $status = course_add::find($data->id);
        $status->status = "active";
        $status->batch_time = $batch_time;
        $status->active_date = $currentDateFormatted;
        $status->update();
        $std_data = DB::table('studentdatas')->where('id', '=', $request->get('id'))->select('*')->first();
        //return $std_data;
        $course_batch = DB::table('courses')
            ->join('batches', 'batches.course_id', '=', 'courses.id')
            ->where('courses.id', '=', $request->get('cid'))
            ->where('batch_time', '=', $request->get('batch_time'))
            ->select('*')
            ->first();
        //return $course_batch;
        $datas = ['student_name' => $std_data->std_name, 'batch_time' => $request->get('batch_time'), 'batch_name' => $course_batch->course_name];
        $user['to'] = $std_data->std_email;
        Mail::send('admin/active_batch_email', $datas, function ($message) use ($user) {
            $message->to($user['to']);
            $message->subject("Your Course is Active ");
        });
        //         $arr=array();
        //                 $data['status']='success';
        // array_push($arr,$data);
        //          //return redirect()->back()->with('message','Course is Active Successfully');
        //         return response()->json($arr);
        return redirect('/fetchapplycourses');
    }
    public function coursesdeletes()
    {
        $students = studentdata::all();
        return view('admin/student_course_delete', compact('students'));
    }
    public function course_fetch($id)
    {
        $course_fetch = DB::table('courses')
            ->join('course_adds', 'course_adds.course_id', '=', 'courses.id')
            ->where('course_adds.student_id', '=', $id)
            ->get();
        return response($course_fetch);
    }
    public function delete_courses_adds(Request $request)
    {

        $course_fetch = DB::table('course_adds')->where('student_id', '=', $request->get('sid'))->where('course_id', '=', $request->get('course_id'))->first();
        //    return $course_fetch;
        $course_adds = course_add::find($course_fetch->id);
        $course_adds->delete();
        return redirect('/course_request_delete');
        //    return response()->json($course_fetch);
    }
    public function showstudentdetails()
    {
        $course = course::all();
        $batch_time = batch::all();
        return view('admin/find_student', compact('course', 'batch_time'));
    }
    public function fetch_batchtimes($id)
    {
        // $cid=$request->get('cid');
        $batches = DB::table('batches')->where('batches.course_id', '=', $id)->select('*')->get();
        return response($batches);
    }
    public function showstudent(Request $request)
    {
        //     $data=array();
        //    $cid =$request->get('cid');
        //    $batch_time=$request->get('batch_time');
        //    $studentfetch=DB::table('studentdatas')
        //    ->join('course_adds','studentdatas.id','=','course_adds.student_id')
        //    ->join('courses','courses.id','=','course_adds.course_id')
        //    ->join('fees_structures','studentdatas.id','=','fees_structures.student_id')
        //    ->where('course_adds.course_id','=',$cid)
        //    ->where('course_adds.batch_time','=',$batch_time)
        //    ->get();

        //     $StudentId=[];
        //    foreach($studentfetch as $stdudents){
        //         $StudentId[]=$stdudents->student_id;

        //     foreach($StudentId as $stud_id){
        //         $studentAllCourse=DB::table('course_adds')
        //         ->where('student_id','=',$stud_id)
        //         ->select('course_id')
        //         ->get();
        //        }

        $data = array();
        $total=array();
        $cid = $request->get('cid');
        $batch_time = $request->get('batch_time');

        $studentfetch = DB::table('studentdatas')
            ->join('course_adds', 'studentdatas.id', '=', 'course_adds.student_id')
            ->join('courses', 'courses.id', '=', 'course_adds.course_id')
            ->join('fees_structures', 'studentdatas.id', '=', 'fees_structures.student_id')
            ->where('course_adds.course_id', '=', $cid)
            ->where('course_adds.batch_time', '=', $batch_time)
            ->get();

        foreach ($studentfetch as $student) {
            $studentId = $student->student_id;

            $studentCourses = DB::table('course_adds')
                ->where('student_id', '=', $studentId)
                ->where('status', '=', "active")
                ->pluck('course_id'); // Get an array of course IDs for the current student

            $courseNames = DB::table('courses')
                ->whereIn('id', $studentCourses)
                ->pluck('course_name'); // Get an array of course names for the current student
            array_push($data, $courseNames);
            $courseFees = DB::table('courses')
                ->whereIn('id', $studentCourses)
                ->sum('total_fees'); // Get the total fees for the current student's courses
                array_push($total,$courseFees);
            // $totalfess=DB::table('courses')
            // ->join('course_adds','courses.id','=','courses_adds.course_id')
            // ->where('student_id', '=', $studentId)
            // ->where('status','=',"active")
            // ->sum('totalfess');
            // array_push($data,$totalfess);

            // $data[$studentId] = $courseNames; // Store course names in the $data array with student ID as key
        }

        //    }


        // array_push($data,$students->std_name);
        return response()->json([$studentfetch, $data,$total]);
        exit();

        //    return response()->json($data);
        //  $studentfetch=DB::table('course_adds')
        //  ->where('course_adds.course_id','=',$cid)
        //  ->where('course_adds.batch_time','=',$batch_time)
        //  ->get();
        return response()->json($studentfetch);
    }
}
