<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\URL;

use App\Models\Product;
use App\Models\Category;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['get', 'get_by_id', 'get_image']]);
    }
    public function get(Request $request)
    {
        $products = null;

        $category_id = $request->input('category');
        $search = $request->input('search');

        if (empty($category_id)) {
            $products = Product::where('name', 'LIKE', '%' . $search . '%')->get();
        } else {
            $products = Product::where('name', 'LIKE', '%' . $search . '%')->where('category_id', '=', $category_id)->get();
        }

        $data = [];
        foreach ($products as $product) {
            $category =  Category::select('id', 'name')->where('id', '=', $product->category_id)->first();
            array_push(
                $data,
                [
                    'id' => $product->id,
                    'name' => $product->name,
                    'description' => $product->description,
                    'image' =>  $product->image,
                    'price' => $product->price,
                    'discount_price' => $product->price - ($product->price * $product->discount / 100),
                    'discount' => $product->discount,
                    'category_id' => $category->id,
                    'category_name' => $category->name,
                ]
            );
        }

        return response()->json([
            'status' => true,
            'message' => "Product List",
            'data' => $data
        ], 200);
    }
    public function get_by_id($id)
    {
        $product = Product::where('id', '=', $id)->first();

        $data = [
            'id' => $product->id,
            'name' => $product->name,
            'description' => $product->description,
            'image' =>  $product->image,
            'price' => $product->price,
            'discount' => $product->discount,
            'category' => Category::select('id', 'name')->where('id', '=', $product->category_id)->first()
        ];

        return response()->json([
            'status' => true,
            'message' => "Product Detail",
            'data' => $data
        ], 200);
    }
    public function insert(Request $request)
    {
        $data = [
            'name' => $request->name,
            'description' => $request->description,
            'image' =>  $request->image,
            'price' => $request->price,
            'discount' => $request->discount,
            'category_id' => $request->category_id
        ];

        Product::create($data);

        return response()->json([
            'status' => true,
            'message' => "Success to create product"
        ], 200);
    }
    public function update(Request $request, $id)
    {
        $data = [
            'name' => $request->name,
            'description' => $request->description,
            'image' =>  $request->image,
            'price' => $request->price,
            'discount' => $request->discount,
            'category_id' => $request->category_id
        ];

        Product::where('id', '=', $id)->update($data);

        return response()->json([
            'status' => true,
            'message' => "Success to update product"
        ], 200);
    }
    public function delete($id)
    {
        $product = Product::where('id', '=', $id)->delete();

        return response()->json([
            'status' => true,
            'message' => "Success to delete product",
        ], 200);
    }
}
