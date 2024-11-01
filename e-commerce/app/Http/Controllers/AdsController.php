<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdsController extends Controller
{
    public function allAdsRequest()
    {
        // Fetch ads based on the user role
        $adsRequest = Auth::user()->role_id == 2
            ? Ad::with(['user', 'product'])->get()
            : Ad::all();

        // Update each ad's activity status
        foreach ($adsRequest as $ad) {
            $ad->updateAdActivityAds();
        }

        // Return the view with updated ads
        return view('dashboard.ads', compact('adsRequest'));
    }
    public function storeAdRequest(Request $request)
    {
        $adData = $request->validate([
            'product_id' => 'required',
            'location' => 'required',
            'price' => 'required',
            'ad_from' => 'required|date',
            'ad_to' => 'required|date|after_or_equal:ad_from',
        ]);

        // Set default ad_type to 'seller' if not provided
        $adData['ad_type'] = $request->input('ad_type', 'seller');

        // Check for existing active ads based on location restrictions
        $location = $adData['location'];

        if ($location === 'homepage') {
            // Check if there are already 5 active ads for the homepage
            $activeHomepageAds = Ad::where('location', 'homepage')
                ->where('status', 'active')
                ->where(function ($query) use ($adData) {
                    $query->whereBetween('ad_from', [$adData['ad_from'], $adData['ad_to']])
                        ->orWhereBetween('ad_to', [$adData['ad_from'], $adData['ad_to']])
                        ->orWhere(function ($query) use ($adData) {
                            $query->where('ad_from', '<=', $adData['ad_from'])
                                ->where('ad_to', '>=', $adData['ad_to']);
                        });
                })
                ->count();

            if ($activeHomepageAds >= 5) {
                return redirect()->back()->with('error', 'The maximum number of ads for the homepage location has been reached. Please choose a different date range.');
            } else {
                $adRequest = new Ad();
                $adRequest->user_id = Auth::user()->id;
                $adRequest->product_id = $adData['product_id'];
                $adRequest->location = $adData['location'];
                $adRequest->price = $adData['price'];
                $adRequest->ad_from = $adData['ad_from'];
                $adRequest->ad_to = $adData['ad_to'];
                $adRequest->status = 'pending'; // Set initial status to pending or as required
                $adRequest->save();
                return redirect()->back()->with('success', 'Your ad request has been successfully submitted to the admin. Please be patient while we review it.');
            }
        } elseif (in_array($location, ['productpage', 'productdetail'])) {
            // Check if there is already 1 active ad for either productpage or productdetail
            $activeProductAds = Ad::where('location', $location)
                ->where('status', 'active')
                ->where(function ($query) use ($adData) {
                    $query->whereBetween('ad_from', [$adData['ad_from'], $adData['ad_to']])
                        ->orWhereBetween('ad_to', [$adData['ad_from'], $adData['ad_to']])
                        ->orWhere(function ($query) use ($adData) {
                            $query->where('ad_from', '<=', $adData['ad_from'])
                                ->where('ad_to', '>=', $adData['ad_to']);
                        });
                })
                ->exists();

            if ($activeProductAds) {
                return redirect()->back()->with('error', 'Only one ad is allowed at a time for the selected location. Please choose a different date range or location.');
            } else {
                $adRequest = new Ad();
                $adRequest->user_id = Auth::user()->id;
                $adRequest->product_id = $adData['product_id'];
                $adRequest->location = $adData['location'];
                $adRequest->price = $adData['price'];
                $adRequest->ad_from = $adData['ad_from'];
                $adRequest->ad_to = $adData['ad_to'];
                $adRequest->status = 'pending'; // Set initial status to pending or as required
                $adRequest->save();

                return redirect()->back()->with('success', 'Your ad request has been successfully submitted to the admin. Please be patient while we review it.');
            }
        }
    }

    public function deleteAdRequest(string $requestId)
    {

        $adRequest = Ad::find($requestId);

        if (!$adRequest) {
            return redirect()->back()->with('error', 'Ad request not found.');
        }


        $adRequest->delete();

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Ad request deleted successfully.');
    }
    public function acceptAdRequest(string $requestId)
    {
        // Find the ad by its ID
        $ad = Ad::find($requestId);

        // Check if the ad exists
        if (!$ad) {
            return redirect()->back()->with('error', 'Ad not found.');
        }
        if ($ad->status == 'active') {
            return redirect()->back()->with('error', 'Already active');
        }
        if ($ad->status == 'expired') {
            return redirect()->back()->with('error', 'The Ad expired');
        }

        // Get the ad's date range
        $adFrom = $ad->ad_from;
        $adTo = $ad->ad_to;
        $location = $ad->location;

        // Check for existing active ads based on location restrictions
        if ($location === 'homepage') {
            // Check if there are already 5 active ads for the homepage location within the date range
            $activeHomepageAds = Ad::where('location', 'homepage')
                ->where('status', 'active')
                ->where(function ($query) use ($adFrom, $adTo) {
                    $query->whereBetween('ad_from', [$adFrom, $adTo])
                        ->orWhereBetween('ad_to', [$adFrom, $adTo])
                        ->orWhere(function ($query) use ($adFrom, $adTo) {
                            $query->where('ad_from', '<=', $adFrom)
                                ->where('ad_to', '>=', $adTo);
                        });
                })
                ->count();

            if ($activeHomepageAds >= 5) {
                $ad->status = 'rejected';
                $ad->save();
                return redirect()->back()->with('error', 'The maximum number of ads for the homepage location has been reached for the selected date range.');
            }
        } elseif (in_array($location, ['productpage', 'productdetail'])) {
            // Check if there is already 1 active ad for the productpage or productdetail location within the date range
            $activeProductAd = Ad::where('location', $location)
                ->where('status', 'active')
                ->where(function ($query) use ($adFrom, $adTo) {
                    $query->whereBetween('ad_from', [$adFrom, $adTo])
                        ->orWhereBetween('ad_to', [$adFrom, $adTo])
                        ->orWhere(function ($query) use ($adFrom, $adTo) {
                            $query->where('ad_from', '<=', $adFrom)
                                ->where('ad_to', '>=', $adTo);
                        });
                })
                ->exists();

            if ($activeProductAd) {
                $ad->status = 'rejected';
                $ad->save();
                return redirect()->back()->with('error', 'Only one ad is allowed at a time for the selected location and date range.');
            }
        }

        // Check if the ad is within the date range and update its status
        $today = Carbon::today();
        if ($today < $adTo) {
            $ad->status = 'active';
        } else {
            $ad->status = 'expired';
        }

        // Save the changes to the current ad
        $ad->save();

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Ad status updated successfully.');
    }

    public function rejectAdRequest(string $requestId)
    {
        $ad = Ad::find($requestId);
        if ($ad->status == 'expired') {
            return redirect()->back()->with('error', 'The Ad expired');
        }

        if ($ad) {
            $ad->status = 'rejected';
            $ad->save();
            return redirect()->back()->with('success', 'Ad Rejected successfully.');
        } else {
            return redirect()->back()->with('error', 'Ad not found.');
        }
    }
}
