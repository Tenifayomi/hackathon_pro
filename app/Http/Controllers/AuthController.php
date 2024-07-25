<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\Auth\CreateUserRequest;
use App\Notifications\EmailVerificationNotification;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
