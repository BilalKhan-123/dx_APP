<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\QuestionsRecords;
use App\Models\StudentsResultsRecords;

class SubjectRecords extends Model
{
    use HasFactory;


    protected $fillable = [  'added_by', 'subject', 'question', 'option1', 'option2', 'option3', 'option4', 'correct_answer', 'score' ];

    protected $guarded = [];

    protected $data  =  ['created_at','updated_at'];

    
    public function questions()
    {
        return $this->hasMany(QuestionsRecords::class, 'id');
    }





}
