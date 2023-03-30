<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Project;
use App\Models\Floor;
use App\Models\Unit;
use App\Traits\Responses;
use Illuminate\Support\Facades\Auth;
use App\Interfaces\EloquentRepositoryInterface;
use Illuminate\Http\JsonResponse;
use Session;
use \Validator;
use Cviebrock\EloquentSluggable\Services\SlugService;


class ProjectController extends Controller
{
    use Responses;
 

    protected EloquentRepositoryInterface $eloquentRepository;

    public function __construct(EloquentRepositoryInterface $eloquentRepository) 
    {
        $this->eloquentRepository = $eloquentRepository;
    }



    public function create(Request $request)
    {

      $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'address' => 'string',
            'floor_name'=> 'string',
            'type' => 'required|string',
            'length' => 'required|string',
            'width' =>  'required|string'
          
        ]);

         if ($validator->fails()) {
             
              return response()->json([
                    'status' => false,
                    'message' => 'validation error',
                    'errors' => $validator->errors()
                ], 401);

        }


        $requests = $request->only([
            'name',
            
            'desc',
            'address',
            'floor_name',
            
            'type',
            'price',
            'length',
            'width',
            'status',
         ]);

        
      

        $create = $this->eloquentRepository->create($requests);


        if ($create) {
               return response()->json([
                'status' => true,
                'message' => 'Project Created Successfully',
                'data' => $create
            ], 200);
        }

        else {

               return response()->json([
                'status' => false,
                'message' => 'Project did not create!',
                'data' => $create
            ], 401);
        }


     

     }








}
