<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function add_product($id = null)
    {
        $product = $id ? Product::findOrFail($id) : null;
        return view('product.add',compact("product"));
    }

    public function product_store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'amount' => 'required|numeric',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($request->id) {
            // Update existing product
            $product = Product::findOrFail($request->id);
        } else {
            // Create new product
            $product = new Product();
        }
        
        $product->name = $request->input('name');
        $product->amount = $request->input('amount');
        $product->description = $request->input('description');

        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $imageName);
            $product->image = $imageName;
        }
    
        $product->save();

        return redirect()->route('admin')->with('success', 'Product added successfully!');
    }

    public function delete_product($id = null)
    {
    $product = Product::findOrFail($id);
    $product->delete();
    return redirect()->route('admin')->with('success', 'Product deleted successfully.');
    }

    public function show($id)
    {
        $product = Product::find($id);

        if (!$product) {
            return redirect()->route('dashboard.index')->with('error', 'Product not found');
        }

        return view('product.show', compact('product'));
    }
}
