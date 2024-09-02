<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\ProductPhoto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::with('category')->get();
        return view('dashboard/products/indexProducts',  compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('dashboard/products/createProduct' , compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate input data
        $data = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'stock_quantity' => 'required|integer',
            'category_id' => 'required|integer',
            'image_url' => 'required|image',
            'images' => 'required|array',
            'images.*' => 'image', // Validate each file as an image
        ]);

        // Handle the main product image (image_url)
        $mainImagePath = null;
        if ($request->hasFile('image_url')) {
            $file = $request->file('image_url');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $mainImagePath = $file->storeAs('public/mainProducts', $filename);
        }

        // Create and save the product
        $product = new Product();
        $product->name = $data['name'];
        $product->description = $data['description'];
        $product->price = $data['price'];
        $product->stock_quantity = $data['stock_quantity'];
        $product->category_id = $data['category_id'];
        $product->image_url = $mainImagePath;
        $product->save();

        // Handle multiple product images (images)
        $imageData = [];
        if ($files = $request->file('images')) {
            foreach ($files as $key => $file) {
                $filename = $key . '-' . time() . '.' . $file->getClientOriginalExtension();
                $path = $file->storeAs('public/multiProducts', $filename);

                $imageData[] = [
                    'product_id' => $product->id,
                    'photo_url' => $path,
                ];
            }
        }

        // Save additional images to the ProductPhoto model
        ProductPhoto::insert($imageData);

        return redirect()->route('allProducts')->with('success', 'Product added');
    }



    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product , string $id)
    {
        // $product = Product::find($id);
        $product = Product::with('photos')->where('id', $id)->first();
        // dd($product);
        $categories = Category::all();
        return view('dashboard/products/editProduct' , compact('product' ,'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
{
    $data = $request->validate([
        'name' => 'required',
        'description' => 'required',
        'price' => 'required|numeric',
        'stock_quantity' => 'required|integer',
        'category_id' => 'required|integer',
        'image_url' => 'nullable|image', // Main image is optional on update
        'images' => 'nullable|array',    // Additional images are optional on update
        'images.*' => 'image',           // Validate each file as an image
    ]);
    // Find the existing product
    $product = Product::findOrFail($id);

    // Update product details
    $product->name = $data['name'];
    $product->description = $data['description'];
    $product->price = $data['price'];
    $product->stock_quantity = $data['stock_quantity'];
    $product->category_id = $data['category_id'];

    // Handle the main product image (image_url)
    if ($request->hasFile('image_url')) {
        // Delete the old image if it exists
        if ($product->image_url && Storage::exists($product->image_url)) {
            Storage::delete($product->image_url);
        }

        // Store the new image
        $file = $request->file('image_url');
        $filename = time() . '.' . $file->getClientOriginalExtension();
        $mainImagePath = $file->storeAs('public/mainProducts', $filename);
        $product->image_url = $mainImagePath;
    }

    // Save the updated product
    $product->save();

    // Handle multiple product images (images)
    if ($request->hasFile('images')) {
        // Optionally, you could delete old additional images here if required
        // ProductPhoto::where('product_id', $product->id)->delete();

        $imageData = [];
        foreach ($request->file('images') as $key => $file) {
            $filename = $key . '-' . time() . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('public/multiProducts', $filename);

            $imageData[] = [
                'product_id' => $product->id,
                'photo_url' => $path,
            ];
        }

        // Insert the new images into the ProductPhoto table
        ProductPhoto::insert($imageData);
    }

    return redirect()->route('allProducts')->with('success', 'Product updated successfully');
}
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product , string $id)
{
    $product = Product::find($id);
    // Delete the main product image if it exists
    if ($product->image_url && Storage::exists($product->image_url)) {
        Storage::delete($product->image_url);
    }

    // Delete all associated additional images from ProductPhoto
    foreach ($product->photos as $photo) {
        if (Storage::exists($photo->photo_url)) {
            Storage::delete($photo->photo_url);
        }
    }

    // Delete the product's related photos from the database
    $product->photos()->delete();

    // Delete the product itself
    $product->delete();

    // Redirect to the list of products with a success message
    return redirect()->route('allProducts')->with('success', 'Product deleted successfully');
}
public function deleteProductImage(string $productId, string $imageId)
{
    // Your logic to delete the image by $imageId for the product $productId
    ProductPhoto::where('id' , $imageId)->delete();
    return redirect()->route('editProduct', $productId)->with('success', 'Image deleted');
}
// public function show
}
