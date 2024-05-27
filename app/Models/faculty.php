<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class faculty extends Model
{
    use HasFactory;
    protected $fillable=['course_id','faculty_name','faculty_image','faculty_mobileno','faculty_city'];
}
