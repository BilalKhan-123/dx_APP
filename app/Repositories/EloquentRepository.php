<?php

namespace App\Repositories;

use App\Interfaces\EloquentRepositoryInterface;
use App\Models\StudentsResultsRecords;
use App\Models\SubjectRecords;
use App\Models\QuestionsRecords;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class EloquentRepository implements EloquentRepositoryInterface 
{


    public function getQuestions() 
    {
        return QuestionsRecords::with('subjects')->orderBy('created_at','ASC')->first();
    }

    public function nextQuestions(array $request) 
    {
        

      
        $getQuestion = QuestionsRecords::find($request['question_id']);

       
        $answer = ($request['answers'] == $getQuestion->correct_answer) ? 1 : 0;
        $score = ($request['answers'] == $getQuestion->correct_answer) ? 1 : 0;
    
       

       
            $save = StudentsResultsRecords::updateOrCreate(
            ['question_id' => $request['question_id']],
            [
            'std_id'  => (session()->has('id')) ? session()->get('id') : 0,
            'std_name'  => (session()->has('name')) ? session()->get('name') : 'Robot',
            'question_id'  => $request['question_id'],
            'answer'  => $answer,
            'correct_answer'  => $getQuestion->correct_answer,
            'score'  => $score
            ]);
            
        








            if ($save) {
                
                 return $answer;
        


            }


       


    }

    public function skipQuestions($question_id)
    {
       

        

      
        $getQuestion = QuestionsRecords::find($question_id);


    
       

       
            $save = StudentsResultsRecords::updateOrCreate(
            ['question_id' => $question_id],
            [
            'std_id'  => (session()->has('id')) ? session()->get('id') : 0,
            'std_name'  => (session()->has('name')) ? session()->get('name') : 'Robot',
            'question_id'  => $question_id,
            'answer'  => 2,
            'correct_answer'  => $getQuestion->correct_answer,
            'score'  => 2
            ]);
            
        
         if ($save) {
                
                 return $save;
        


            }


       


    



    }


    public function results(array $request)
    {
        return QuestionsRecords::with('subjects')
                            ->where('id','>', $request['question_id'])
                            ->paginate();
    }


    public function getById($orderId) 
    {
        return Project::findOrFail($orderId);
    }

    public function delete($orderId) 
    {
        Project::destroy($orderId);
    }

    public function create(array $request)
    {

    
        
        $merge = array('slug' =>  $request['name'],'user_id' =>  Auth::id());
        $request = array_merge($merge, $request);
        
        $create  = Project::create($request);

        if ($create) {
            
            
            $floor = new Floor();
            $floor->project_id = $create->id;
            $floor->name = $request['floor_name'];
            $floor->save();

            $unit = new Unit();
            $unit->project_id = $create->id;
            $unit->unit_number  = rand(1,100000);
            $unit->type = $request['type'];
            $unit->price = $request['price'];
            $unit->length = $request['length'];
            $unit->width = $request['width'];
            //$floor->area = $request['floor_name'];
            $unit->save();



        }


        return $create;







    }

    public function update($orderId, array $newDetails) 
    {
        return Project::whereId($orderId)->update($newDetails);
    }




}