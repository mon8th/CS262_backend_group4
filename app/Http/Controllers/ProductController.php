<?php
namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('user')->paginate(10);
        return view('products.productstock', ['products' => $products]);
    }

    public function create()
    {
        return view('products.create');
    }

    public function show($id)
    {
        $product = Product::findOrFail($id);
        // if(is_null($product)){
        //     return response()->json([
        //         'status' => 'error',
        //         'message' => 'Product not found',
        //     ], 404);
        // }
        // $response = [
        //     'product' => $product,
        //     'status' => 'success',
        //     'message' => 'Product retrieved successfully',
        // ];
        // return response()->json($response, 200);
        return view('products.view', compact('product'));
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('products.edit', compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'price' => 'required|numeric',
            'quantity' => 'required|integer',
            'location' => 'required|string',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('product_images', 'public');
            $product->image = $imagePath;
        }

        $product->name = $validated['name'];
        $product->category = $validated['category'];
        $product->price = $validated['price'];
        $product->quantity = $validated['quantity'];
        $product->location = $validated['location'];
        $product->description = $validated['description'];
        $product->save();

        return redirect()->route('productstock')->with('success', 'Product updated successfully');
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()->route('productstock')->with('success', 'Product deleted successfully.');
    }

    public function toggleTrending(Product $product)
    {
        $product->trending = !$product->trending;
        $product->save();

        return redirect()->route('productstock')->with('success', 'Product trending status updated.');
    }
}
