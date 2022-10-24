<?php

namespace App\Imports;

use App\Models\Question;
use Maatwebsite\Excel\Concerns\ToModel;

class QuestionImports implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Question([
            'id' => $row[0],
            'question_name' => $row[1],
            'type' => (int)$row[2],
            'image' => $row[3],
            'autdio' => $row[4],
            'answer_a' => $row[5],
            'answer_b' => $row[6],
            'answer_c' => $row[7],
            'answer_d' => $row[8],
            'correct_answer' => $row[9],
            'explain' => $row[10],
            'created_at' => $row[11],
            'updated_at' => $row[12],
            'is_active' => 1,
            'status' => 1
        ]);
    }
}
