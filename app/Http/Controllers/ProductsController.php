<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\ProductResource;



class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        //die("DSS");
        //echo request(); exit;
        
        return new ProductResource( Product::paginate(1));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $result = [];
        $validator = Validator::make($request->all(), [            
            'name' => 'required|max:255',
            'category' => 'required|max:255',
            'description' => 'required|max:255',
            'price' => 'required|numeric|max:255',
            'avatar' => 'required|mimes:png,jpg,jpeg|max:1048',
        ]);

        if ($validator->fails()) {

            $result['status'] = 0 ;
            $result['error'] = $validator->errors()->first();
            $result['message'] = "Data Not Valid." ;
        } else {
            // ALL IS WELL
            $fileName = time().'.'.$request->file('avatar')->extension();  
            $request->file('avatar')->move(public_path('uploads'), $fileName);


            Product::create([
                'name' => $request->input('name'),
                'category' => $request->input('category') ,
                'description' => $request->input('description'),
                'price' => $request->input('price'),
                'avatar' => $fileName
            ]);
            $result['status'] = 1 ;
            $result['message'] = "Product Created Successfully!" ;
        }
        return response()->json($result, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
