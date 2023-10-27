<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Oex_res extends Model
{
    protected $table="oex_res";
    protected $primaKey="id";
    protected $fillable=['exam_id','question_id','yes_answer','no_answer','result'];
}
