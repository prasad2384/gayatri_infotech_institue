<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class fees_structure extends Model
{
    use HasFactory;
    protected $fillable=['student_id','paid_fees'];
}
