<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Cart;
use App\Models\Product;

class CartController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['get']]);
    }
    public function get()
    {
        $data = [];

        $carts = Cart::get();

        foreach ($carts as $c) {
            array_push(
                $data,
                [
                    'id' => $c->id,
                    'product' => Product::where('id', '=', $c->product_id)->first(),
                    'quantity' => $c->quantity
                ]
            );
        }

        return response()->json([
            'status' => true,
            'message' => "Cart List Items",
            'data' => $data
        ], 200);
    }

    public function insert(Request $request)
    {
        $id = Cart::create([
            "product_id" => $request->product_id,
            "quantity" => $request->quantity,
            "created_at" => date('Y-m-d H:i:s')
        ])->id;


        $cart = Cart::where('id', '=', $id)->first();

        $cart->product = Product::where('id', '=', $cart->product_id)->first();


        return response()->json([
            'status' => true,
            'message' => "Success to add cart items",
            'data' => $cart
        ], 200);
    }
    public function update(Request $request, $id)
    {
        Cart::where('id', '=', $id)->update([
            "product_id" => $request->product_id,
            "quantity" => $request->quantity,
            "updated_at" => date('Y-m-d H:i:s')
        ]);

        $cart = Cart::where('id', '=', $id)->first();

        $cart->product = Product::where('id', '=', $cart->product_id)->first();


        return response()->json([
            'status' => true,
            'message' => "Success to update cart items",
            'data' => $cart
        ], 200);
    }
    public function delete($id)
    {
        Cart::where('id', '=', $id)->delete();

        return response()->json([
            'status' => true,
            'message' => "Success to delete cart items"
        ], 200);
    }
}
