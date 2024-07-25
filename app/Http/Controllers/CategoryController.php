<?php

namespace App\Http\Controllers;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        $success = [
            'Message' => 'Categories Fetch Successfully',
            'data' => $categories
        ];
        return response()->json($success, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateddata = $request->validate([
            'Category'=>'required|String'
        ]);

        $categories = Category::create($validateddata);
        if($categories){
             $success = [
                "message"=> "Here are our categories",
                "data" => $categories->fresh(),
                "status" => true
             ];
             return response()->json($success, 200);

        }else{ 
                $bug = [
                    "message" => "An error occured",
                    "status" => false
                ];
                return response()->json($bug, 404);

    }
     }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $categories = Category::find($id);

        if($categories){
            
                $success = [
                    "message" => "We hope you like our products",
                    "data" => $categories->fresh(),
                    "status" => true
                ];

                return response()->json($success, 200);
            
        }else{ 
            $bug = [
                "message" => "Not Found",
                "status" => false
            ];
            return response()->json($bug, 404);

        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'Category' => 'required|string'
        ]);
        $categories = Category::find($id);
        
        if($categories){
           
          $categories->update($validatedData);
          
          $success = [
            "message" => "Category updated sucessfully",
            "status" => true,
            "data" => $categories->fresh()

        ];
        return response()->json($success, 200);
    }else{
        $bug = [
            "message" => "Category not found on Database",
            "status" => false
        ];
        return response()->json($bug, 404);
    }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Category::destroy($id);
        return response()->json([
            "message" => "Deleted Succesfully"
        ],200);
    }
}
