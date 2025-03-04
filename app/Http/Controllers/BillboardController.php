<?php

namespace App\Http\Controllers;

use App\Models\Billboard;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class BillboardController extends Controller
{
  public function index(Request $request)
  {
    $query = Billboard::query()
      ->with('media')
      ->when($request->filled('search'), function (Builder $query) use ($request) {
        $query->where(function ($q) use ($request) {
          $q->where('name', 'like', "%{$request->search}%")
            ->orWhere('location', 'like', "%{$request->search}%")
            ->orWhere('city', 'like', "%{$request->search}%");
        });
      })
      ->when($request->filled('country'), function (Builder $query) use ($request) {
        $query->where('country', $request->country);
      })
      ->when($request->filled('city'), function (Builder $query) use ($request) {
        $query->where('city', $request->city);
      })
      ->when($request->filled('status'), function (Builder $query) use ($request) {
        $query->where('status', $request->status);
      })
      ->when($request->filled('price_range'), function (Builder $query) use ($request) {
        [$min, $max] = explode('-', $request->price_range);
        if ($max === 'plus') {
          $query->where('monthly_rate', '>=', (int) $min);
        } else {
          $query->whereBetween('monthly_rate', [(int) $min, (int) $max]);
        }
      })
      ->when($request->filled('sort'), function (Builder $query) use ($request) {
        [$column, $direction] = explode('-', $request->sort);
        $query->orderBy($column, $direction);
      }, function (Builder $query) {
        $query->latest();
      });

    // Get filter options
    $countries = Billboard::distinct()->pluck('country')->sort();
    $cities = Billboard::distinct()->pluck('city')->sort();
    $priceRanges = [
      '0-1000' => 'Up to $1,000',
      '1000-2000' => '$1,000 - $2,000',
      '2000-5000' => '$2,000 - $5,000',
      '5000-plus' => '$5,000+',
    ];

    $billboards = $query->paginate(12)->withQueryString();

    return view('pages.billboards.index', compact(
      'billboards',
      'countries',
      'cities',
      'priceRanges'
    ));
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
