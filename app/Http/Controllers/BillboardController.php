<?php

namespace App\Http\Controllers;

use App\Models\Billboard;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class BillboardController extends Controller
{
  public function index(Request $request)
  {
    $query = Billboard::query()->with('media');

    // Apply filters
    if ($request->filled('country')) {
      $query->where('country', $request->country);
    }

    if ($request->filled('city')) {
      $query->where('city', $request->city);
    }

    if ($request->filled('status')) {
      $query->where('status', $request->status);
    }

    if ($request->filled('priceRange')) {
      [$min, $max] = explode('-', $request->priceRange);
      $query->when($max !== '+', function (Builder $query) use ($min, $max) {
        $query->whereBetween('monthly_rate', [$min, $max]);
      }, function (Builder $query) use ($min) {
        $query->where('monthly_rate', '>=', $min);
      });
    }

    // Get unique countries and cities for filters
    $countries = Billboard::distinct()->pluck('country');
    $cities = Billboard::distinct()->pluck('city');

    // Get billboards with pagination
    $billboards = $query->latest()->paginate(12)->withQueryString();

    // Get featured billboards for each country
    $featuredMalawiBillboards = Billboard::where('country', 'Malawi')
      ->where('status', 'available')
      ->with('media')
      ->take(3)
      ->get();

    $featuredZambiaBillboards = Billboard::where('country', 'Zambia')
      ->where('status', 'available')
      ->with('media')
      ->take(3)
      ->get();

    return view(
      'pages.home',
      compact(
        'billboards', 'countries', 'cities', 'featuredMalawiBillboards', 'featuredZambiaBillboards'
      )
    );
  }

  public function show(Billboard $billboard)
  {
    // Add structured data for SEO
    $structuredData = [
      '@context' => 'https://schema.org',
      '@type' => 'Product',
      'name' => $billboard->name,
      'description' => $billboard->description,
      'image' => $billboard->getFirstMediaUrl('billboard_images'),
      'offers' => [
        '@type' => 'Offer',
        'availability' => $billboard->status === 'available' ? 'https://schema.org/InStock' : 'https://schema.org/OutOfStock',
        'price' => $billboard->monthly_rate,
        'priceCurrency' => 'USD',
        'priceValidUntil' => now()->addMonths(3)->format('Y-m-d'),
      ],
      'geo' => [
        '@type' => 'GeoCoordinates',
        'latitude' => $billboard->latitude,
        'longitude' => $billboard->longitude,
      ],
    ];

    return view('pages.billboard-detail', [
      'billboard' => $billboard,
      'structuredData' => $structuredData,
    ]);
  }

  public function home()
  {
    // Get featured billboards for each country
    $featuredMalawiBillboards = Billboard::where('country', 'Malawi')
      ->where('status', 'available')
      ->with('media')
      ->take(3)
      ->get();

    $featuredZambiaBillboards = Billboard::where('country', 'Zambia')
      ->where('status', 'available')
      ->with('media')
      ->take(3)
      ->get();

    // Get statistics
    $statistics = [
      'totalBillboards' => Billboard::count(),
      'totalCities' => Billboard::distinct('city')->count(),
      'yearsOfExperience' => 15, // You can adjust this value
      'satisfiedClients' => 500, // You can adjust this value
    ];

    // Get testimonials
    $testimonials = [
      [
        'name' => 'John Doe',
        'company' => 'ABC Corporation',
        'content' => 'FirstMark has helped us achieve unprecedented visibility in key locations across Malawi.',
        'avatar' => asset('images/testimonials/john-doe.jpg'),
      ],
      // Add more testimonials here
    ];

    return view('pages.home', array_merge(
      compact(
        'featuredMalawiBillboards',
        'featuredZambiaBillboards',
        'testimonials'
      ),
      $statistics
    ));
  }
}
