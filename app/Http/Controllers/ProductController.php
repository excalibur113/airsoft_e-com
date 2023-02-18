<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
{
    $products = Product::all();
    return response()->json($products);
}
public function show($id)
{
    $product = Product::find($id);
    if ($product) {
        return response()->json($product);
    } else {
        return response()->json(['message' => 'Product not found.'], 404);
    }
}
public function store(Request $request)
{
    $product = new Product;
    $product->name = $request->name;
    $product->description = $request->description;
    $product->image = $request->image;
    $product->price = $request->price;
    $product->category_id = $request->category_id;
    $product->brand = $request->brand;
    $product->inventory = $request->inventory;
    $product->save();
    return response()->json(['message' => 'Product created.'], 201);
}
public function update(Request $request, $id)
{
    $product = Product::find($id);
    if (!$product) {
        return response()->json(['message' => 'Product not found.'], 404);
    }
    $product->name = $request->name;
    $product->description = $request->description;
    $product->image = $request->image;
    $product->price = $request->price;
    $product->category_id = $request->category_id;
    $product->brand = $request->brand;
    $product->inventory = $request->inventory;
    $product->save();
    return response()->json(['message' => 'Product updated.'], 200);
}
public function destroy($id)
{
    $product = Product::find($id);
    if (!$product) {
        return response()->json(['message' => 'Product not found.'], 404);
    }
    $product->delete();
    return response()->json(['message' => 'Product deleted.'], 200);
}

}
