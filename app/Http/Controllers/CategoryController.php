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
        foreach ($categories as $category) {
            array_push(
                $data,
                [
                    'id' => $category->id,
                    'name' => $category->name,
                    'image' => $category->image,
                    'created_at' => $category->created_at,
                    'updated_at' => $category->updated_at,
                ]
            );
        }

        return response()->json([
            'status' => true,
            'message' => "Category List",
            'data' => $data
        ], 200);
    }
}
