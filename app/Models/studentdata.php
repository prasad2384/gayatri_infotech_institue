<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class studentdata extends Model
{
    use HasFactory;
    protected $fillable=
    ['std_name',
    'std_email',
    'std_password',
    'std_phoneno',
    'std_dob',
    'std_gender',
    'std_course',
    'std_profile',
    'std_clgname',
    'std_degree',
    'std_clgtimefrom',
    'std_clgtimeto',
    'std_passoutyear',
    'std_grade',
    'std_university',
    'std_parentsname',
    'std_parentsno',
    'std_parentsoccupation',
    'std_address'];
}
