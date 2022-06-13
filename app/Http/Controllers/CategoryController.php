<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;

use App\Models\Category;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['get', 'get_image']]);
    }
    public function get()
    {
        $categories = Category::get();

        $data = [];
        foreach ($categories as $c) {
            array_push(
                $data,
                [
                    'id' => $c->id,
                    'name' => $c->name,
                    'image' => $c->image,
                    'created_at' => $c->created_at,
                    'updated_at' => $c->updated_at,
                ]
            );
        }

        return response()->json([
            'status' => true,
            'message' => "Category List",
            'data' => $data
        ], 200);
    }
    public function get_image($id)
    {
        $categories = Category::where('id', '=', $id)->first();

        $path = storage_path($categories->image);
        if (file_exists($path)) {
            $file = file_get_contents($path);
            return response($file, 200)->header('Content-Type', 'image/jpeg');
        }

        return response()->json([
            'status' => true,
            'message' => "Product image not found"
        ], 200);
    }
}
