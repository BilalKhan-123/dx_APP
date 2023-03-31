<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;





// Models 
use App\Models\StudentsResultsRecords;
use App\Models\SubjectRecords;
use App\Models\QuestionsRecords;
use App\Models\User;

use App\Interfaces\EloquentRepositoryInterface;
use Illuminate\Validation\Rule;
use Session;
use Redirect;
use Illuminate\Support\Facades\Hash;
Use \Carbon\Carbon;
use \Validator;




class OperationsController extends Controller
{

    protected EloquentRepositoryInterface $eloquentRepository;

    function __construct(EloquentRepositoryInterface $eloquentRepository)
    {
        $this->active = 1;
        $this->title = "MCQS Based Test";

        $this->eloquentRepository = $eloquentRepository;
    }

    public function index()
    {
       $title = $this->title; 
       return view('index',compact('title'));     



    }



    public function getQuestions(Request $request)
    {

          $count = QuestionsRecords::where('active',$this->active)->get();
        if (isset($_POST['next'])) {
           


             
               //dd($count);
               $questions =  QuestionsRecords::with('subjects')
                            ->where('id','>', $request['question_id'])
                            ->first();

                //dd($questions);            

               if (!$questions) 
               {

                    $wrong = StudentsResultsRecords::where('answer',0)
                                ->where('std_name',session()->get('name'))
                                ->where('std_id',session()->get('id'))
                                ->count();
                    $correct = StudentsResultsRecords::where('answer',1)
                                ->where('std_name',session()->get('name'))
                                ->where('std_id',session()->get('id'))
                                ->count();
                    $skipp = StudentsResultsRecords::where('answer',2)
                                ->where('std_name',session()->get('name'))
                                ->where('std_id',session()->get('id'))
                                ->count();

                    return view('results',compact('count','correct','wrong','skipp'));        
                
                }             



               return view('questions',compact('questions','count'));


        }

        if (isset($_POST['skip'])) {


            $skipQuestions = $this->eloquentRepository->skipQuestions($request['question_id']);
            $questions =  QuestionsRecords::with('subjects')
                            ->where('id','>', $request['question_id'])
                            ->first();

             return view('questions',compact('questions','count'));
            
        }



      


      $validator = Validator::make($request->all(), [
            'name' => 'required|string|min:3',
   
        ]);

         if ($validator->fails()) {
             
            return Redirect::back()->with('failed','Name must contains minumum 4 chars!');

         }


        $questions = $this->eloquentRepository->getQuestions($request->all());
        //dd($questions);
        $count = QuestionsRecords::where('active',$this->active)->get();

          session([
            'name' => $request->name,
            'id' => rand(10,99999),
            'count' => count($count)
          ]);


        if ($questions) {
            
            return view('questions',compact('questions','count'));

        }

        else {

             return Redirect::back()->with('failed','Its seems that there is no any question record found!');

        }
     }


     public function nextQuestions(Request $request)
     {
        

        $request = $request->all();


        if (!session()->has('name')) {
                 
             return Redirect::to('/')->with('failed','Session not set!');
        }    


        $questions = $this->eloquentRepository->nextQuestions($request);
        $count = QuestionsRecords::where('active',$this->active)->count();

        if ($questions) {
            
           // return true;
           // dd($questions);

            //dd($questions);
             return response()->json($questions);

           //$questions = $this->eloquentRepository->results($request);
            //return view('questions',compact('questions','count'));

        }

        else {

             return Redirect::back()->with('failed','Its seems that there is no any question record found!');

        }




     }
}
