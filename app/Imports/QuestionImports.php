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
            // 'id' => $row[0],
            'question_name' => $row[0],
            'type' => (int)$row[1],
            'image' => $row[2],
            'autdio' => $row[3],
            'answer_a' => $row[4],
            'answer_b' => $row[5],
            'answer_c' => $row[6],
            'answer_d' => $row[7],
            'correct_answer' => $row[8],
            'explain' => $row[9],
            'exam_id' => (int)$row[10],
            'number_for_exam' => (int)$row[11],
        ]);
    }
}
