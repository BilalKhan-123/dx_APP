<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


use App\Models\QuestionsRecords;
use App\Models\User;


class StudentsResultsRecords extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'std_id', 'std_name', 'question_id', 'answer', 'correct_answer', 'score', 'active', 'created_at', 'updated_at'];


    public function results()
    {
        return $this->belongsTo(QuestionsRecords::class, 'id');
    }

    public function student()
    {
        return $this->belongsTo(User::class, 'std_id');
    }

}
