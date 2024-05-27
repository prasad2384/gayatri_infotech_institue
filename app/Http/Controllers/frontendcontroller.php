<?php

namespace App\Http\Controllers;

use App\Models\course;
use Illuminate\Http\Request;

class frontendcontroller extends Controller
{
    //
    public function courses()
    {
        $course=course::all();
        return view('student.course',compact('course'));
    }
}
