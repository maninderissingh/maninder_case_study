<?php

namespace App\Http\Controllers;

use App\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\CartCollection;
use App\Http\Resources\CartResource;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
        return new CartCollection( Cart::with('productRecord')->where(['session_id' => $request->input('session_id') ])->paginate(10));
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
        $validationRules =  [           
        'product_id' => 'required|numeric|max:255',
        'qty' => 'required|numeric|max:255',
        ];
        
        $validator = Validator::make($request->all(), $validationRules);
        //$this->pr();
        if ($validator->fails()) {

            $result['status'] = 0 ;
            $result['error'] = $validator->errors()->first();
            $result['message'] = "Data Not Valid." ;
        } else {
            // ALL IS WELL
            $session_id = $request->input('session_id');
            if(empty($session_id)){
                // No Session ID in the Request
                // User is Creating Fresh Cart
                $session_id = Str::random(60);
            }
            

            Cart::create([
                'session_id' => $session_id,
                'user_id' => $request->user->id ,
                'product_id' => $request->input('product_id'),
                'qty' => $request->input('qty'),
            ]);
            $result['status'] = 1 ;
            $result['session_id'] = $session_id ;
            $result['message'] = "Item added!" ;
        }
        return response()->json($result, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function show(Cart $cart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function edit(Cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cart $cart)
    {
        //$this->pr($cart);    
        $cart->qty = $request->input("qty");
        $cart->save();
        $result['status'] = 1 ;
        $result['message'] = "Item updated!";
        return response()->json($result, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cart $cart)
    {
        $cart->delete();
        $result['status'] = 1 ;
        $result['message'] = "Cart Item Deleted Successfully!" ;
    
        return response()->json($result, 200); 
    }
}
