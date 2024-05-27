<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class course_add extends Model
{
    use HasFactory;
    protected $fillable=['student_id','course_id','batch_time','status','active_date'];
}
