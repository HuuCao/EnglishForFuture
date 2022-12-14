<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    protected $table = "tbl_results";
    protected $fillable = [
        'listen',
        'reading',
        'point',
        'user_id',
        'exam_id',
    ];
}
