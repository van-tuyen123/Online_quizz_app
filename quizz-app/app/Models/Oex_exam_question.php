<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Oex_exam_question extends Model
{
    protected $table ="oex_exam_questions";
    protected $primaryKey = 'id';
    protected $fillable = ['exam_id','question','answer','options','status'];
}
