<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Oex_exam extends Model
{
    protected $table ="oex_exams";
    protected $primaryKey = "id";
    protected $fillable = ['title','category','exam_date','status'];
}
