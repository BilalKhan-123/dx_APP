<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\StudentsResultsRecords;
use App\Models\SubjectRecords;

class QuestionsRecords extends Model
{
    use HasFactory;


    protected $fillable = [  'added_by', 'subject', 'question', 'option1', 'option2', 'option3', 'option4', 'correct_answer', 'score' ];

    protected $guarded = [];

    protected $date  =  ['created_at','updated_at'];

    
    public function subjects()
    {
        return $this->belongsTo(SubjectRecords::class, 'subject');
    }

    public function results()
    {
        return $this->hasOne(StudentsResultsRecords::class, 'question_id');
    }









}
