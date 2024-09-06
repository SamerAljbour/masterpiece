<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reviews = Review::all();
        return view('dashboard/reviews', compact('reviews'));
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
        //store customer review
        $validator = Validator::make($request->all(), [
            'user_id' => 'required',
            'product_id' => 'required',
            'rating' => 'required',
            'comment' => "required",
        ]);
        if ($validator->fails()) {
            return redirect()
                ->route('productdetail')
                ->withErrors($validator)
                ->withInput();
        }
        $validatedData = $validator->validated();

        Review::create([
            'product_id' => $validatedData['product_id'],
            'user_id' => $validatedData['user_id'],
            'rating' => $validatedData['rating'],
            'comment' => $validatedData['comment'],
        ]);
        return redirect()->route('productdetail', $validatedData['product_id'])->with('success', 'review submitted successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Review $review)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Review $review)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Review $review)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Review $review)
    {
        //
    }
}
