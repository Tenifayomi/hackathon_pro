<?php

namespace App\Http\Controllers;
use App\Models\splashscreen;
use Illuminate\Http\Request;
use App\Http\Requests\Splashscreen\UpdateRequest;

class SplashscreenController extends Controller
{
    public function storepage1(Request $request){
        $data = $request->validate([

            'Title' =>'required|string',
            'Subtitle'=> 'sometimes|string',
            'image_url'=>'sometimes|string'
        ]);

        $splashData = splashscreen::create($data);
        }

        public function showPage1(string $id){

            $splashData = splashscreen::find($id);

            if($splashData){
                if($splashData){$success= [
                    'fetch'=>$splashData->fresh()
                ];
               }
    
                return response()->json($success, 200);
             }else{
                $error = [
                    "message" => "Not Found",
                     "status" => false
                ];
                return response()->json($error, 404);
            }
            }

            public function updatepage1(Request $request, string $id)
            {
                $validatedData = $request->validate([
            'Title' =>'required|string',
            'Subtitle'=> 'required|string',
            'image_url'=>'sometimes|string'     
                ]);

                $splashData = splashscreen::find($id);
                
                if($splashData){
                   
                  $splashData->update($validatedData);

                  $success = [
                    "message" => "Category updated sucessfully",
                    "status" => true,
                    "data" => $splashData->fresh()
        
                ];
                return response()->json($success, 200);
            }else{
                $error = [
                    "message" => "Category not found on Database",
                    "status" => false
                ];
                return response()->json($error, 404);
            }
        
            }
            
            public function destroypage1(string $id)
            {
                splashscreen::destroy($id);
                return response()->json([
                    "message" => "Deleted Succesfully"
                ],200);
            }
    



        public function storepage2(Request $request){
            $data = $request->validate([
                'Title' =>'required|string',
                'Subtitle'=> 'sometimes|string',
                'image_url'=>'sometimes|string'
            ]);
    
            $splashData = splashscreen::create($data);
            }

            public function showPage2(string $id){

                $splashData=  splashscreen::find($id);
    
                if($splashData){
                    if($splashData){$success= [
                        'fetch'=>$splashData->fresh()
                    ];
                   }
                  
                    return response()->json($success, 200);
                 }else{
                    $error = [
                        "message" => "Not Found",
                         "status" => false
                    ];
                    return response()->json($error, 404);
                 }
                }

                public function updatepage2(Request $request , String $id){
                    $validatedData = $request->validate([
                        'Title' =>'required|string',
                        'Subtitle'=> 'required|string',
                        'image_url'=>'sometimes|string' 
                    ]);
                    $splashData = splashscreen::find($id);
                
                if($splashData){
                   
                  $splashData->update($validatedData);

                  $success = [
                    "message" => "Category updated sucessfully",
                    "status" => true,
                    "data" => $splashData->fresh()
        
                ];
                return response()->json($success, 200);
            }else{
                $error = [
                    "message" => "Category not found on Database",
                    "status" => false
                ];
                return response()->json($error, 404);
            }
                }
                
                public function destroypage2(string $id)
    {
        splashscreen::destroy($id);
        return response()->json([
            "message" => "Deleted Succesfully"
        ],200);
    }

            public function storepage3(Request $request){
                $data = $request->validate([
                    'Title' =>'required|string',
                    'Subtitle'=> 'sometimes|string',
                    'image_url'=>'sometimes|string'
                ]);
        
                $splashData = splashscreen::create($data);
                
                }
                public function showPage3(string $id){

                    $splashData=  splashscreen::find($id);
        
                    if($splashData){
                        if($splashData){$success= [
                            'fetch'=>$splashData->fresh()
                        ];
                       }
                      
                        return response()->json($success, 200);
                     }else{
                        $error = [
                            "message" => "Not Found",
                             "status" => false
                        ];
                        return response()->json($error, 404);
                     }
                    }
                    public function updatepage3(Request $request , String $id){
                        $validatedData = $request->validate([
                            'Title' =>'required|string',
                            'Subtitle'=> 'required|string',
                            'image_url'=>'sometimes|string' 
                        ]);
                        $splashData = splashscreen::find($id);
                    
                    if($splashData){
                       
                      $splashData->update($validatedData);
    
                      $success = [
                        "message" => "Category updated sucessfully",
                        "status" => true,
                        "data" => $splashData->fresh()
            
                    ];
                    return response()->json($success, 200);
                }else{
                    $error = [
                        "message" => "Category not found on Database",
                        "status" => false
                    ];
                    return response()->json($error, 404);
                }
                    }
                    
                    public function destroypage3(string $id)
        {
            splashscreen::destroy($id);
            return response()->json([
                "message" => "Deleted Succesfully"
            ],200);
        }
    


                public function storepage4(Request $request){
                    $data = $request->validate([
                        'Title' =>'required|string',
                        'Subtitle'=> 'sometimes|string',
                        'image_url'=>'sometimes|string'
                    ]);
            
                    $splashData = splashscreen::create($data);
                    }

                    public function showPage4(string $id){

                        $splashData=  splashscreen::find($id);
            
                       if($splashData){
                        if($splashData){$success= [
                            'fetch'=>$splashData->fresh()
                        ];
                       }
                      
                        return response()->json($success, 200);
                     }else{
                        $error = [
                            "message" => "Not Found",
                             "status" => false
                        ];
                        return response()->json($error, 404);
                     }
                    }
        
                    public function updatepage4(Request $request , String $id){
                        $validatedData = $request->validate([
                            'Title' =>'required|string',
                            'Subtitle'=> 'required|string',
                            'image_url'=>'sometimes|string' 
                        ]);
                        $splashData = splashscreen::find($id);
                    
                    if($splashData){
                       
                      $splashData->update($validatedData);
    
                      $success = [
                        "message" => "Category updated sucessfully",
                        "status" => true,
                        "data" => $splashData->fresh()
            
                    ];
                    return response()->json($success, 200);
                }else{
                    $error = [
                        "message" => "Category not found on Database",
                        "status" => false
                    ];
                    return response()->json($error, 404);
                }
                    }
                    
                    public function destroypage4(string $id)
        {
            splashscreen::destroy($id);
            return response()->json([
                "message" => "Deleted Succesfully"
            ],200);
        }
    
}
