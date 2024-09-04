<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
// use Dotenv\Validator;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the request data
        $validator = Validator::make($request->all(), [
            'user_id' => 'required|integer|exists:users,id',
            'product_id' => 'required|integer|exists:products,id',
            'status' => 'required|string|max:255',
            'quantity' => 'required|integer|min:1',
            'price' => 'required|numeric|min:0',
        ]);

        // Check if validation fails
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        // Extract inputs
        $quantity = $request->input('quantity');
        $price = $request->input('price');

        // Calculate total_amount
        $totalAmount = $price * $quantity;


        // Create a new order record
        $order = Order::create([
            'user_id' => $request->input('user_id'),
            'status' => $request->input('status'),
            'total_amount' => $totalAmount,
            'shipping_address' => $request->input('shipping_address', ''), // Add this line if shipping address is needed
        ]);
        $orderItem = OrderItem::create([
            'order_id' => $order->id,
            'product_id' => $request->input('product_id'),
            'quantity' => $quantity,
            'price' => $price,
        ]);
        // dd($order);
        // Return a success response
        return response()->json(['message' => 'Order created successfully', 'order' => $order, 'orderItem' => $orderItem], 201);
    }




    /**
     * Display the specified resource.
     */
    public function show(Order $order, Request $request) {}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        //
    }
    // newCart.productId = productId;
    //     newCart.productName = productName;
    //     newCart.productPrice = productPrice;
    //     newCart.productImage = productImage;
    //     newCart.productImage = productImage;

}
