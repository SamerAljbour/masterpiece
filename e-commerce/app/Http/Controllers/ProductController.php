<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\ProductPhoto;
use App\Models\ProductVariantCombination;
use App\Models\Seller;
use App\Models\Subcategory;
use App\Models\Variant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::with(['category'])->get();
        // dd($products);
        return view('dashboard/products/indexProducts',  compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        $sellers = Seller::with('user')->get();
        // $subCategories = Subcategory::all();
        // dd($categories);
        return view('dashboard/products/createProduct', compact('categories', 'sellers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)

    {
        // dd($request->all());
        // Validate input data
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'category_id' => 'required|integer|exists:categories,id',
            'image_url' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'images' => 'required|array',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'sizes' => 'nullable|array',
            'sizes.*' => 'string',
            'colors' => 'nullable|array',
            'colors.*' => 'string',
            'variant_stock' => 'required|array',
            'variant_stock.*' => 'integer|min:0',
            // 'variant_prices' => 'required|array',
            // 'variant_prices.*' => 'numeric|min:0',
            'type' => 'nullable|array',
            'type.*' => 'string|max:255',
            'resolution' => 'nullable|array',
            'resolution.*' => 'string|max:255',
            'processor' => 'nullable|array',
            'processor.*' => 'string|max:255',
            'flavor' => 'nullable|array',
            'flavor.*' => 'string|max:255',
            'material' => 'nullable|array',
            'material.*' => 'string|max:255',
            'on_sale' => 'nullable|numeric|min:0.01|max:0.99',
        ]);
        // dd($data);

        // Handle the main product image
        $mainImagePath = null;
        if ($request->hasFile('image_url')) {
            $file = $request->file('image_url');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $mainImagePath = $file->storeAs('public/mainProducts', $filename);
        }
        $storeId = Seller::where('user_id', Auth::user()->id)->first(); // get the seller store id
        // Create and save the product
        $product = new Product();
        $product->name = $data['name'];
        $product->description = $data['description'];
        $product->price = $data['price'];
        $product->category_id = $data['category_id'];
        if ($request->has('toSeller'))
            $product->seller_id = $request->input('toSeller');
        else
            $product->seller_id = $storeId->id;

        $product->on_sale = $data['on_sale'];
        // dd($product->seller_id);
        $product->image_url = $mainImagePath;
        $product->save();

        // Handle multiple product images
        if ($files = $request->file('images')) {
            $imageData = [];
            foreach ($files as $key => $file) {
                $filename = $key . '-' . time() . '.' . $file->getClientOriginalExtension();
                $path = $file->storeAs('public/multiProducts', $filename);

                $imageData[] = [
                    'product_id' => $product->id,
                    'photo_url' => $path,
                ];
            }
            ProductPhoto::insert($imageData);
        }

        if ($request->has('sizes') || $request->has('colors') || $request->has('flavor')) {
            // Ensure all arrays have the same length
            $variantCount = max(
                count($data['sizes'] ?? []),
                count($data['colors'] ?? []),
                count($data['variant_stock']),
                // count($data['variant_prices'])
            );

            $totalstock = 0; // Initialize total stock accumulator

            // Loop through the arrays and save each variant
            for ($i = 0; $i < $variantCount; $i++) {
                // Create a new variant for the product
                $variant = new ProductVariantCombination();
                $variant->product_id = $product->id;

                // Set stock and price for each variant
                $variant->stock = $data['variant_stock'][$i] ?? 0;
                $totalstock += $data['variant_stock'][$i] ?? 0; // Accumulate total stock
                // $variant->price = $data['variant_prices'][$i] ?? 0;

                // Store size, color, and other additional fields as JSON in variant_options
                $variantOptions = [
                    'size' => $data['sizes'][$i] ?? null,
                    'color' => $data['colors'][$i] ?? null,
                    'type' => $data['type'][$i] ?? null,
                    'resolution' => $data['resolution'][$i] ?? null,
                    'processor' => $data['processor'][$i] ?? null,
                    'flavor' => $data['flavor'][$i] ?? null,
                    'material' => $data['material'][$i] ?? null,
                ];
                // Laravel will handle the JSON conversion
                // $variant->variant_options = json_encode($variantOptions);
                $variant->variant_options = $variantOptions;

                $variant->save();
            }

            // After all variants have been saved, update the total stock for the product
            Product::where('id', $product->id)->update([
                'total_stock' => $totalstock, // Update total stock in the database
            ]);
        }
        if (Auth::user()->role_id == 3)
            return redirect()->route('allProducts')->with('success', 'Product added successfully!');
        else
            return redirect()->route('profileStore')->with('success', 'Product added successfully!');
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
    public function edit(Product $product, string $id)
    {
        // $product = Product::find($id);
        $product = Product::with(['photos', 'variants'])->where('id', $id)->first();
        // dd($product);
        $categories = Category::all();
        return view('dashboard/products/editProduct', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validate input data
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'category_id' => 'required|integer|exists:categories,id',
            'image_url' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Make image optional for updates
            'images' => 'nullable|array',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'sizes' => 'nullable|array',
            'sizes.*' => 'string',
            'colors' => 'nullable|array',
            'colors.*' => 'string',
            'variant_stock' => 'required|array',
            'variant_stock.*' => 'integer|min:0',
            'type' => 'nullable|array',
            'type.*' => 'string|max:255',
            'resolution' => 'nullable|array',
            'resolution.*' => 'string|max:255',
            'processor' => 'nullable|array',
            'processor.*' => 'string|max:255',
            'flavor' => 'nullable|array',
            'flavor.*' => 'string|max:255',
            'material' => 'nullable|array',
            'material.*' => 'string|max:255',
            'on_sale' => 'nullable|numeric|min:0.01|max:0.99',
        ]);

        // Find the product by ID
        $product = Product::findOrFail($id);
        $newVariantarr = [];
        // Handle the main product image if a new one is uploaded
        if ($request->hasFile('image_url')) {
            $file = $request->file('image_url');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $mainImagePath = $file->storeAs('public/mainProducts', $filename);

            // Delete the old image if necessary
            if ($product->image_url) {
                Storage::delete($product->image_url);
            }

            $product->image_url = $mainImagePath;
        }

        // Update product details
        $product->name = $data['name'];
        $product->description = $data['description'];
        $product->price = $data['price'];
        $product->category_id = $data['category_id'];
        $product->seller_id = $request->has('toSeller') ? $request->input('toSeller') : $product->seller_id; // Ensure seller_id is set correctly
        $product->on_sale = $data['on_sale'];
        $product->save();

        // Handle multiple product images
        if ($files = $request->file('images')) {
            $imageData = [];
            foreach ($files as $key => $file) {
                $filename = $key . '-' . time() . '.' . $file->getClientOriginalExtension();
                $path = $file->storeAs('public/multiProducts', $filename);

                $imageData[] = [
                    'product_id' => $product->id,
                    'photo_url' => $path,
                ];
            }
            ProductPhoto::insert($imageData);
        }
        // dd($data);

        if (
            $request->has('sizes') ||
            $request->has('colors') ||
            $request->has('type') ||
            $request->has('resolution') ||
            $request->has('processor') ||
            $request->has('flavor') ||
            $request->has('material')
        ) {
            // Get existing variants
            $existingVariants = ProductVariantCombination::where('product_id', $product->id)->get()->keyBy('id');
            // Ensure all arrays have the same length
            $variantCount = max(
                count($data['sizes'] ?? []),
                count($data['colors'] ?? []),
                count($data['variant_stock'])
            );

            $totalStock = 0; // Initialize total stock accumulator
            if ($product->category_id != $data['category_id']) {
                ProductVariantCombination::where('product_id', $product->id)->delete();
                // return redirect()->back()->with('error', 'Product not found.');
            }

            // Loop through the arrays and update each variant
            for ($i = 0; $i < $variantCount; $i++) {
                $variantId = $existingVariants->keys()->get($i); // Get the variant ID from existing variants
                $variant = $existingVariants->get($variantId) ?? new ProductVariantCombination(); // Use existing or create new

                if (!$variant->exists) {
                    // New variant
                    $variant->product_id = $product->id;
                }

                // Update stock and total stock
                $variant->stock = $data['variant_stock'][$i] ?? 0;
                $totalStock += $variant->stock;

                // Set variant options with new values from the request
                $variantOptions = [
                    'size' => $data['sizes'][$i] ?? null,
                    'color' => $data['colors'][$i] ?? null,
                    'type' => $data['type'][$i] ?? null,
                    'resolution' => $data['resolution'][$i] ?? null,
                    'processor' => $data['processor'][$i] ?? null,
                    'flavor' => $data['flavor'][$i] ?? null,
                    'material' => $data['material'][$i] ?? null,
                ];
                // dd($variantOptions);

                // Update variant options (this will replace the old ones)
                $variant->variant_options = $variantOptions;

                // Save the variant (either new or updated)
                $variant->save();
                $newVariantarr[] = $variant->id;
            }

            // Update total stock for the product
            $product->total_stock = $totalStock;
            $product->save();
        }

        // Redirect based on role
        if (Auth::user()->role_id == 3) {
            return redirect()->route('allProducts')->with('success', 'Product updated successfully!');
        } else {
            return redirect()->route('profileStore')->with('success', 'Product updated successfully!');
        }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product, string $id)
    {
        // Retrieve the product by its ID, including the associated photos
        $product = Product::with('photos')->find($id);

        if (!$product) {
            return redirect()->back()->with('error', 'Product not found.');
        }

        // Soft-delete the product's related photos
        foreach ($product->photos as $photo) {
            $photo->delete(); // This will soft-delete the photo due to SoftDeletes trait in the ProductPhoto model
        }

        // Soft-delete the product itself
        $product->delete(); // This will soft-delete the product due to SoftDeletes trait in the Product model

        // Redirect to the list of products with a success message
        return redirect()->back()->with('success', 'Product soft-deleted successfully');
    }
    public function deleteVariant(string $id)
    {
        ProductVariantCombination::where("id", $id)->delete();
        return redirect()->back()->with('success', 'Product variant deleted successfully');
    }
    // public function deleteProductImage(string $productId, string $imageId)
    // {
    //     $photo = ProductPhoto::find($imageId); // Retrieve the photo instance

    //     if ($photo) {
    //         // Optionally delete the image from storage if necessary
    //         Storage::delete($photo->photo_url);

    //         // Delete the record from the database
    //         $photo->delete();

    //         return redirect()->back()->with('success', 'Image deleted successfully');
    //     } else {
    //         return redirect()->back()->with('error', 'Image not found');
    //     }
    // }
    public function showDeletedProducts()
    {
        $deletedProducts = Product::onlyTrashed()
            ->with(['photos' => function ($query) {
                $query->withTrashed(); // Ensure soft-deleted product photos are included
            }])
            ->get();

        $deletedProductsForSeller = Product::onlyTrashed()
            ->whereHas('seller', function ($query) {
                $query->where('user_id', Auth::id()); // Ensure the seller belongs to the authenticated user
            })
            ->with(['photos' => function ($query) {
                $query->withTrashed(); // Ensure soft-deleted product photos are included
            }])
            ->get();
        return view('dashboard.restoreProduct', compact('deletedProducts', 'deletedProductsForSeller'));
    }
    public function restoreProduct(Request $request)
    {
        // Retrieve the soft-deleted product, including the soft-deleted photos
        $product = Product::withTrashed()->with(['photos' => function ($query) {
            $query->withTrashed(); // Include soft-deleted photos in the query
        }])->where('id', $request->input('product_id'))->first();

        if ($product) {
            // Restore the product
            $product->restore();

            // Restore the associated photos
            if ($product->photos) { // Ensure you're accessing the 'photos' relationship
                foreach ($product->photos as $photo) {
                    $photo->restore(); // Restore each soft-deleted photo
                }
            }

            return redirect()->back()->with('success', 'Product and its photos restored successfully');
        }

        return redirect()->back()->with('error', 'Product not found or cannot be restored');
    }
}
