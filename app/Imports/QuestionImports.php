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
            'exam_id' => (int)$row[11],
            'number_for_exam' => (int)$row[12],
        ]);
    }
}
