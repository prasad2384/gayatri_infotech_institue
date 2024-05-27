<?php

namespace App\Http\Controllers;

use App\Models\course_add;
use Illuminate\Http\Request;
use App\Models\studentdata;
use App\Models\course;
use App\Models\faculty;
use App\Models\fees_structure;
use Illuminate\Support\Facades\DB;
use App\Models\contact;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Carbon;

use function Laravel\Prompts\alert;

class studentcontroller extends Controller
{
    //
    public function store(Request $request)
    {

        $request->validate(
            [
                'std_name' => 'required',
                'std_email' => 'required|Email|regex:/^([a-z0-9._%-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,})$/',
                'std_password' => 'required|min:5',
                'std_phoneno' => 'required|numeric|regex:"^[6-9]\d{9}$"',
                'std_dob' => 'required',
                'std_gender' => 'required',
                'std_clgname' => 'required',
                'std_degree' => 'required',
                'std_clgtimefrom' => 'required',
                'std_clgtimeto' => 'required',
                'std_passoutyear' => 'required',
                'std_university' => 'required',
                'std_parentsname' => 'required',
                'std_parentsno' => 'required|numeric|regex:"^[6-9]\d{9}$"',
                'std_parentsoccupation' => 'required',
                'std_profile' => 'required',
                'std_address' => 'required',
            ],
            [
                'std_name.required' => ' Enter Name',
                'std_email.regex' => 'Enter Email Address is Not Valid',
                'std_password.min' => 'Minimum five characters or more,',
                'std_phoneno.regex' => 'Please Enter Valid Mobileno',
                'std_dob.required' => 'Enter Date of Birth',
                'std_clgname.required' => 'Enter College Name',
                'std_genger.required' => 'Select Gender',
                'std_degree.required' => 'Select Qualification',
                'std_clgtimefrom.required' => 'Select Start College Time',
                'std_clgtimeto.required' => 'Select College End Time',
                'std_passoutyear.required' => 'Enter Passout Year',
                'std_university.required' => 'Enter University Name',
                'std_parentsname.required' => 'Enter Your Parents Name',
                'std_parentsno.regex' => 'Enter Valid Phone No',
                'std_parentsoccupation.required' => 'Enter Your Parents Occupation',
                'std_profile.required' => 'Select Your Profile',
                'std_address.required' => 'Enter Your Address',
            ]

        );


        // $std_profile=$request->get('std_profile');
        $file = $request->file('std_profile');
        $filename = $file->getClientOriginalName();
        $destinationpath = './assets/images';

        $stdname = $request->get('std_name');
        $std_email = $request->get('std_email');
        $std_password = $request->get('std_password');
        $std_phoneno = $request->get('std_phoneno');
        $std_dob = $request->get('std_dob');
        $std_gender = $request->get('std_gender');
        //    $std_course=$request->get('std_course');
        $std_clgname = $request->get('std_clgname');
        $std_degree = $request->get('std_degree');
        $std_clgtimefrom = $request->get('std_clgtimefrom');
        $std_clgtimeto = $request->get('std_clgtimeto');
        $std_passoutyear = $request->get('std_passoutyear');
        //   $std_grade=$request->get('std_grade');
        $std_university = $request->get('std_university');
        $std_parentsname = $request->get('std_parentsname');
        $std_parentsno = $request->get('std_parentsno');
        $std_parentsoccupation = $request->get('std_parentsoccupation');
        $std_address = $request->get('std_address');
        $student = new studentdata([
            "std_name" => $stdname,
            "std_email" => $std_email,
            "std_password" => $std_password,
            "std_phoneno" => $std_phoneno,
            "std_dob" => $std_dob,
            "std_gender" => $std_gender,
            //  "std_course"=>$std_course,
            "std_profile" => $filename,
            "std_clgname" => $std_clgname,
            "std_degree" => $std_degree,
            "std_clgtimefrom" => $std_clgtimefrom,
            "std_clgtimeto" => $std_clgtimeto,
            "std_passoutyear" => $std_passoutyear,
            // "std_grade"=>$std_grade,
            "std_university" => $std_university,
            "std_parentsname" => $std_parentsname,
            "std_parentsno" => $std_parentsno,
            "std_parentsoccupation" => $std_parentsoccupation,
            "std_address" => $std_address,
        ]);
        $student_email = DB::table('studentdatas')->where('std_email', '=', $std_email)->count();
        if ($student_email > 0) {
            echo "<script>alert('You Enter Email ID is Already Exits Please login');window.location.href='/register'</script>";
            // return response()->json(['status'=>'success','message'=>'Already Account Register with this email id']);
        } else {
            $student->save();
            $file->move($destinationpath, $filename);
            $datas = ['stdname' => $stdname, 'std_email' => $std_email, 'std_dob' => $std_dob, 'std_password' => $std_password, 'std_gender' => $std_gender, 'std_phoneno' => $std_phoneno];
            $user['to'] = $std_email;
            Mail::send('admin/register_email', $datas, function ($message) use ($user) {
                $message->to($user['to']);
                $message->subject("congratulations🎉 Your Registration is Successfully Completed");
            });
            // return back();
            //return response()->json(['status'=>'success','message'=>'Register Successfully']);
            echo "<script>alert('Register Successfully');window.location.href='/login'</script>";
        }
    }
    public function studentlogins(Request $request)
    {
        // $currentDateFormatted = Carbon::now()->format('Y-m-d');  
        // $carbonDate=Carbon::parse($currentDateFormatted);   
        //   return $newDate = $carbonDate->addMonths(3)->format('Y-m-d');
        //   exit();
        $request->validate(
            [
                'std_email' => 'required',
                'std_password' => 'required',
            ],
            [
                'std_email.required' => 'Enter Valid Email',
                'std_password.required' => 'Enter Valid Password'
            ]
        );
        $std_email = $request->get('std_email');
        $std_password = $request->get('std_password');
        $student_data = DB::table('studentdatas')
            ->where('std_email', '=', $std_email)
            ->first();
        // print_r($student_data);
        // exit();

        if ($student_data == '') {
            echo "<script>alert('Your Account Not Found');
            window.location.href='/login';
        </script>";
        } else {
            if ($std_email == $student_data->std_email && $std_password == $student_data->std_password) {
                $request->session()->put('std_email', $student_data->std_email);
                $request->session()->put('std_id', $student_data->id);
                $request->session()->put('std_profile', $student_data->std_profile);
                return redirect('/');
            } else {
                echo "<script>alert('Your Account Not Found');
                window.location.href='/login';
            </script>";
            }
        }
    }
    public function studentlogouts()
    {
        // session()->flush();
        session()->forget('std_email');
        session()->forget('std_id');
        session()->forget('std_profile');
        return redirect('/');
    }
    public function studentdashboards()
    {
        $apply_course_count = DB::table('courses')
            ->join('course_adds', 'courses.id', '=', 'course_adds.course_id')
            ->where('course_adds.student_id', '=', session('std_id'))
            ->count();

        $active_course_count = DB::table('course_adds')
            ->where('status', '=', 'active')
            ->where('student_id', '=', session('std_id'))
            ->count();

        $sum_fees = DB::table('courses')
            ->join('course_adds', 'courses.id', '=', 'course_adds.course_id')
            ->where('course_adds.student_id', '=', session('std_id'))
            ->where('course_adds.status', '=', 'active')
            ->sum('courses.total_fees');

        $paid_fees = DB::table('fees_structures')
            ->where('student_id', '=', session('std_id'))
            ->select('paid_fees')
            ->first();

        // echo "<pre>";
        // print_r($paid_fees);
        // exit();


        return view('student.dashboard', compact('apply_course_count', 'paid_fees', 'active_course_count', 'sum_fees', 'paid_fees'));
    }
    public function studentcourseadds(Request $request, $id)
    {
        if (session('std_email') == '') {
            echo "<script>
                alert('You First Login and then Add the course');
                window.location.href='/';</script>";
        } else {
            // echo "<script>alert($id);</script>";
            // echo session('std_id');
            // exit();
            $applied_course = DB::table('course_adds')
                ->where('student_id', '=', session('std_id'))
                ->where('course_id', '=', $id)
                ->count();
            // echo $applied_course;
            // exit();
            if ($applied_course) {
                echo "<script>alert('Course is already Added please check your dashboard');
                    window.location.href='/courses'</script>";
            } else {

                $data = new course_add([
                    'student_id' => session('std_id'),
                    'course_id' => $id,
                    'status' => 'inactive'
                ]);
                $fees_structure_fetch = DB::table('fees_structures')->where('student_id', '=', session('std_id'))->count();
                if ($fees_structure_fetch != 1) {
                    $add_fees = new fees_structure([
                        'student_id' => session('std_id'),
                    ]);
                    $add_fees->save();
                }
                $data->save();
                echo "<script>alert('Your Course Added Successfully');
                window.location.href='/courses'</script>";
            }
        }
    }
    public function showappliedcourses()
    {
        $applied_courses = DB::table('courses')
            ->join('course_adds', 'courses.id', '=', 'course_adds.course_id')
            ->where('course_adds.student_id', '=', session('std_id'))
            ->select('*')
            ->get();


        return view('student.appliedcourses', compact('applied_courses'));
    }
    public function appliedcoursedeletes(string $id)
    {
        echo $id;
        $data = course_add::find($id);
        $data->delete();
        return redirect()->back()->with('message', 'Your Course Deleted Successfully');
        // exit();
    }
    public function updatestudentfetchdatas()
    {
        $student = studentdata::find(session('std_id'));
        // echo $student->std_gender;
        // exit();
        return view('student.student_update', compact('student'));
    }
    public function updatestudents(Request $request, $id)
    {
        $std_profile = $request->get('std_profile');
        $file = $request->file('std_profile');
        $destinationpath = './assets/images';
        $std_name = $request->get('std_name');
        $std_email = $request->get('std_email');
        //   $std_password=$request->get('std_password');
        $std_phoneno = $request->get('std_phoneno');
        $std_dob = $request->get('std_dob');
        $std_gender = $request->get('std_gender');
        //    $std_course=$request->get('std_course');
        $std_clgname = $request->get('std_clgname');
        $std_degree = $request->get('std_degree');
        $std_clgtimefrom = $request->get('std_clgtimefrom');
        $std_clgtimeto = $request->get('std_clgtimeto');
        $std_passoutyear = $request->get('std_passoutyear');
        //    $std_grade=$request->get('std_grade');
        $std_university = $request->get('std_university');
        $std_parentsname = $request->get('std_parentsname');
        $std_parentsno = $request->get('std_parentsno');
        $std_parentsoccupation = $request->get('std_parentsoccupation');
        $std_address = $request->get('std_address');

        $data = studentdata::find($id);
        $data->std_name = $std_name;
        $data->std_email = $std_email;
        //   $data->std_password=$std_password;
        $data->std_phoneno = $std_phoneno;
        $data->std_dob = $std_dob;
        $data->std_gender = $std_gender;

        $data->std_clgname = $std_clgname;
        $data->std_degree = $std_degree;
        $data->std_clgtimefrom = $std_clgtimefrom;
        $data->std_clgtimeto = $std_clgtimeto;
        $data->std_passoutyear = $std_passoutyear;
        $data->std_university = $std_university;
        $data->std_parentsname = $std_parentsname;
        $data->std_parentsno = $std_parentsno;
        $data->std_parentsoccupation = $std_parentsoccupation;
        $data->std_address = $std_address;
        if ($file) {
            $filename = $file->getClientOriginalName();
            $file->move($destinationpath, $filename);
            $data->std_profile = $filename;
        }
        $data->update();

        return redirect('studentdashboard')->with('message', 'Student Profile Updated Successfully');
    }
    public function contacts()
    {
        return view('student.contact');
    }
    public function abouts()
    {
        $faculty = faculty::all();
        return view('student.about', compact('faculty'));
    }
    public function single_page(string $id)
    {
        $url= str_replace('_',' ',$id);
       
        $course = course::where([
            ['course_name','=',$url]
        ])->first();
           
        return view('student.single_course', compact('course'));
    }
    public function addcontacts(Request $request)
    {
        $request->validate(
            [

                'name' => 'required',
                'email' => 'required|Email|regex:/^([a-z0-9._%-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,})$/',
                'number' => 'required|numeric|regex:"^[6-9]\d{9}$"',
                'std_dob' => 'required',
                'message' => 'required',

            ],
            [
                'name.required' => ' Enter Name',
                'email.regex' => 'Enter Email Address is Not Valid',
                'number.regex' => 'Please Enter Valid Mobileno',
                'message.required' => 'Enter Date of Birth',
            ]
        );
        $name = $request->get('name');
        $email = $request->get('email');
        $number = $request->get('number');
        $message = $request->get('message');

        $contact = new contact([
            "name" => $name,
            "email" => $email,
            "number" => $number,
            "message" => $message,
        ]);
        $contact->save();
        echo "<script>alert('Your Data is Submitted Successfully');
                window.location.href='contact';
        </script>";
    }
    public function  studentfees(Request $request)
    {
        $data = DB::table('course_adds')
            ->join('courses', 'courses.id', '=', 'course_adds.course_id')
            ->where('course_adds.student_id', '=', session('std_id'))
            ->where('course_adds.status', '=', 'active')
            ->select('*')
            ->get();
        $paid_fees = DB::table('fees_structures')->where('student_id', '=', session('std_id'))->select('*')->first();
        // echo $data->paid_fees;
        // exit();
        return view('student.student_fee_structure', compact('data', 'paid_fees'));
    }
    public function student_register(Request $request)
    {
        return view('student/student_register');
    }
    public function student_login(Request $request)
    {
        return view('student/student_login');
    }
    public function courses()
    {
        $course=course::all();
        return view('student.course',compact('course'));
    }
}
