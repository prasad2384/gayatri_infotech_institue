<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class course extends Model
{
    use HasFactory;
    protected $fillable=['category_id','course_name','course_image','course_mode','course_duration','course_status','total_fees','shortdesc','longdesc'];
}
