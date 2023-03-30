<?php

namespace App\Http\Controllers;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Interfaces\EloquentRepositoryInterface;
use App\Traits\Responses;
use Illuminate\Support\Facades\Auth;
use Session;
use \Validator;
use Mail;

class UserController extends Controller
{

    use Responses;
    /**
     * Display a listing of the resource.
     */




    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }



    // Above Methods will use 


    // Custom Functions


    public function register(Request $request)
    {


        

        $validator = Validator::make($request->all(), [

            'name' => 'required|string|max:255',
            'email' => 'required|string|email|unique:users,email',
            'password' => 'required|min:8'
        
        ]);

         if($validator->fails()){
                return response()->json([
                    'status' => false,
                    'message' => 'validation error',
                    'errors' => $validator->errors()
                ], 401);



            }

     // If validate checked successfully

     
      $user = User::create([
            'name' => $request->name,
            'password' => bcrypt($request->password),
            'email' => $request->email
        ]);



        if ($user) {

            /*   $message = 'You are registered Successfully!';

                    $to_name = $request->name;
                    $to_email = $request->email;
                   
                    
                    $data = array( 'name' => $to_name,
                                   'message' => $message
                                   );
       

                      Mail::send('emails.registerEmail', $data, function($message) use($to_email,$to_name) {
                         $message->to($to_email, $to_name)->subject('Registration Email');
                         $message->from('islamabadgreen45@gmail.com','Signup Soultions');
                      });
                         */



          return response()->json([
                'status' => true,
                'message' => 'User Created Successfully',
                'token' => $user->createToken("API TOKEN")->plainTextToken
            ], 200);
          
        }

        else {

         return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }

     
    }




    public function login(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), 
            [
                'email' => 'required|email',
                'password' => 'required'
            ]);

            if($validator->fails()){
                return response()->json([
                    'status' => false,
                    'message' => 'validation error',
                    'errors' => $validator->errors()
                ]);
            }

            if(!Auth::attempt($request->only(['email', 'password']))){
               
                return response()->json([
                    'status' => false,
                    'message' => 'Sorry we did not find your record!.',
                ]);
            }

            $user = User::where('email', $request->email)->first();

            return response()->json([
                'status' => true,
                'message' => 'You have Logged In Successfully',
                'token' => $user->createToken("API TOKEN")->plainTextToken,
                'user' => $user
            ], 200);

        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }


    public function logout()
    {
        auth()->user()->tokens()->delete();

        return response()->json([
                'status' => true,
                'message' => 'Logged out Successfully',
             ]);
    }
}







