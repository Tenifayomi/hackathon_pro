<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Product\StoreRequest;
use App\Http\Requests\Product\updateRequest;
use App\Models\Product;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products =  Product::all();

      $success = [
        "message" => "Product Fetch Successfully",
        "data" => $products
      ];

     return response()-> json($success, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        $validatedData = $request->validated();

          $product = Product::create($validatedData);

            if($product){
                $data = [
                    "message" => "Product Created Successfully",
                    "data" => $product->fresh(),
                    "status" => true
                ];

                return response()->json($data, 200);
            }else{ 
                $bug = [
                    "message" => "Error while creating",
                    
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
        $product = Product::find($id);

        if($product){
            
                $data = [
                    "message" => "Product Created Successfully",
                    "data" => $product->fresh(),
                    "status" => true
                ];

                return response()->json($data, 200);
            
        }else{ 
            $data = [
                "message" => "Not Found",
                
                "status" => false
            ];
            return response()->json($data, 404);

        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validateData = $request->validate([
            "product_brand" =>"sometimes|string",
            "product_name" => "sometimes|string",
            "product_price" =>"sometimes|string",
            "product_color" =>"sometimes|string"
        ]);

        $product = Product::find($id);
        
        if($product){ 
          $product->update($validateData);

            $success = [
                "message" => "Product updated sucessfully",
                "status" => true,
                "data" => $product->fresh()

            ];
            return response()->json($success, 200);
        }else{
            $error = [
                "message" => "Product not found on Database",
                "status" => false
            ];
            return response()->json($error, 404);
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Product::destroy($id);
        return response()->json([
            "message" => "Deleted Succesfully"
        ],200);
    }
}
