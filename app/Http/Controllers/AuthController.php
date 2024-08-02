<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\Auth\CreateUserRequest;
use App\Http\Requests\Auth\verifyUserRequest;
use App\Notifications\EmailVerificationNotification;
use Ichtrojan\Otp\Otp;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\Auth\ForgotPasswordRequest;
use App\Notifications\forgotPassword;



class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $allUsers =  User::all();

        $success = [
          "message" => "Users Fetch Successfully",
          "data" => $allUsers
        ];
  
       return response()-> json($success, 200);
    }

    /**
     * Store a newly created resource in storage.
     */

     /**
 * @OA\Post(
 *     path="register",
 *     summary="Create a new user",
 *     tags={"Users"},
 *     @OA\RequestBody(
 *         required=true,
 *         @OA\JsonContent(        
 *             @OA\Property(property="email", type="string", example="adeola@gmial.com"),
 *             @OA\Property(property="password", type="string", example="23456"),
 *             @OA\Property(property="username", type="string", example="adeola")
 *     ),),
 *     @OA\Response(
 *         response=200,
 *         description="Successful creation",
 *         @OA\JsonContent(
 *             @OA\Property(property="message", type="string", example="Welcome on board"),
 *             @OA\Property(property="status", type="boolean", example=true),
 *             @OA\Property(property="verification", type="string", example="Not verified, OTP sent successfully")
 *         )
 *     ),
 *     @OA\Response(
 *         response=400,
 *         description="Error occurred",
 *         @OA\JsonContent(
 *             @OA\Property(property="message", type="string", example="An error occurred"),
 *             @OA\Property(property="status", type="boolean", example=false)
 *         )
 *     )
 * )
 */

    public function createUser(CreateUserRequest $request)
    {
        $validateData = $request->validated();
        if($validateData){
            $user = User::create($validateData);
            if($user){
                $user->notify(new EmailVerificationNotification());
                $success= [
                    "message" => "Welcome on board",
                    "status" => true,
                    "verification"=> "Not verified, OTP sent successfully"
                ];
                return response()->json($success, 200);
            }else{
                $error=[
                    "message" => "An error occured",
                    "status"=>false
                ];
                return response()->json($error, 400);
            }

        }

    }

    
    public function verify_user(verifyUserRequest $request){
       $data = $request ->validated();

     $validatedData =(new Otp)->validate($data ['email'], $data['token']);


     if($validatedData->status){

        $root = User::where("email", $validatedData->email)->first();

        $dev = $root->update([
            'is_verified'=>true,
            'email_verified_at'=>now()
        ]);

    }else{ $error = 
        [
        'message' =>$validatedData->message,
        'status'=>false
    ];
    return response()->json($error, 400);

    }
if($dev){
     $token = $root->createToken("auth")->plainTextToken;

    $success = [
        'token'=> $token,
        'message' => 'You have been verified',
        'data' => $root->fresh()
    ];
return response()->json($success, 200);

}else{
$error = [
    'message' =>$validatedData->message,
    'status'=>false
];
return response()->json($error, 400);
}}

public function login (LoginRequest $request){
    $info = $request->validated();

    $user = User::where("email", $info['email'])->first();

    if($user){

   $correctPassword =  Hash::check($info ["password"], $user->password) ;

   if($correctPassword){
    $success = [
        "Message"=> "Log In Successful",
        "Status"=> true,
        "Data"=> $user->fresh()
    ];
return response()->json($success, 200);
   }else{
    $error = [
        'Message'=> "Email or Password is Incorrect",
        "Status"=> false
    ];
    return response()->json($error, 400);
   }
    }
}

public function forgot_password(ForgotPasswordRequest $request){

    $info = $request->validated();

    $user = User::where("email", $info["email"])->first();

    if($user){
        $user->notify(New forgotPassword);

        $success = [
            "Message"=> "Otp sent successfully",
            "Status"=> true,
        ];
        return response()->json($success, 200);
    }else{
        $error= [
            "Message" => "Failed to send Otp, Email not found",
            "Status" => false
        ];
        return response()->json($error, 404);
    }

}
    /**
     * Display the specified resource.
     */
    public function show(string $id)
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
}
