<?php

namespace App\Http\Controllers;

use App\Models\PaymentHistory;
use App\Models\Review;
use App\Models\Seller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
                ->back()
                ->withErrors($validator)
                ->withInput();
        }
        $validatedData = $validator->validated();

        $checkReview = PaymentHistory::where('user_id', Auth::user()->id)->where('product_id', $request['product_id'])->first();
        if (!$checkReview) {
            return redirect()->back()->with('error', 'You should buy the product first to be able to review it.');
        }
        Review::create([
            'product_id' => $validatedData['product_id'],
            'user_id' => $validatedData['user_id'],
            'rating' => $validatedData['rating'],
            'comment' => $validatedData['comment'],
        ]);
        // seller  id
        $countOfReviews = Review::where('product_id', $validatedData['product_id'])->count();
        // dd($countOfReviews);
        $sumOfReviews = Review::where('product_id', $validatedData['product_id'])->sum('rating');
        $sellers = Seller::with('products')
            ->whereHas('products', function ($query) use ($validatedData) {
                $query->where('id', $validatedData['product_id']);
            })
            ->first();
        $rateOfStore = $countOfReviews > 0
            ? round(($sumOfReviews / $countOfReviews), 1) // Average rating from 1 to 5
            : 0;
        Seller::where('user_id', Auth::user()->id)->update(['rating' => $rateOfStore]);
        // $sellers->rating = $rateOfStore;
        $sellers->save();
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
    public function destroy(Review $review, string $id, Request $request)
    {
        $productId = $request->input('productId');
        $review = Review::find($id);
        if ($review) {
            $review->delete();
            return redirect()->route('productdetail', $productId)->with('deletedReview', "you successfully deleted you review");
        }
    }
}
