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
      ->when($request->filled('search'), function (Builder $query) use ($request) {
        $query->where(function ($q) use ($request) {
          $q->where('name', 'like', "%{$request->search}%")
            ->orWhere('location', 'like', "%{$request->search}%")
            ->orWhere('city', 'like', "%{$request->search}%");
        });
      })
      ->when($request->filled('country') && $request->country !== 'all', function (Builder $query) use ($request) {
        $query->whereRaw('LOWER(country) = ?', [strtolower($request->country)]);
      })
      ->when($request->filled('city') && $request->city !== 'all', function (Builder $query) use ($request) {
        $query->whereRaw('LOWER(city) = ?', [strtolower($request->city)]);
      })
      ->when($request->filled('type') && $request->type !== 'all', function (Builder $query) use ($request) {
        $query->whereRaw('LOWER(type) = ?', [strtolower($request->type)]);
      })
      ->when($request->filled('sort'), function (Builder $query) use ($request) {
        [$column, $direction] = explode('-', $request->sort);
        $query->orderBy($column, $direction);
      }, function (Builder $query) {
        $query->latest();
      });

    // Get filter options
    $cities = Billboard::distinct()
      ->pluck('city')
      ->filter()  // Remove any null values
      ->map(fn($city) => ucfirst(strtolower($city))) // Normalize case
      ->sort()
      ->values()
      ->toArray(); // Convert to array explicitly

    $countries = Billboard::distinct()
      ->pluck('country')
      ->filter()
      ->map(fn($country) => ucfirst(strtolower($country)))
      ->sort()
      ->values()
      ->toArray();

    $types = Billboard::distinct()
      ->pluck('type')
      ->filter()
      ->map(fn($type) => ucfirst(strtolower($type)))
      ->sort()
      ->values()
      ->toArray();

    $billboards = $query->paginate(12)->withQueryString();

    // Transform the data to include only what we need
    $billboards->through(function ($billboard) {

      // $media = $billboard->getFirstMedia();
      $url = $billboard->getFirstMediaUrl();
      $billboard->featured_image = $url ?? null;

      unset($billboard->media);

      return $billboard;
    });

    return view('pages.billboards.index', [
      'billboards' => $billboards,
      'cities' => $cities,
      'countries' => $countries,
      'types' => $types,
      'filters' => [
        'country' => strtolower($request->input('country', 'all')),
        'city' => strtolower($request->input('city', 'all')),
        'type' => strtolower($request->input('type', 'all')),
        'sort' => $request->input('sort', 'created_at-desc'),
      ],
    ]);
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

    // Get related billboards in the same city or of the same type
    $relatedBillboards = Billboard::query()
      ->where('id', '!=', $billboard->id)
      ->where(function ($query) use ($billboard) {
        $query->where('city', $billboard->city)
          ->orWhere('type', $billboard->type);
      })
      ->with(['media' => function ($query) {
        $query->orderBy('order_column')
          ->select(['id', 'model_id', 'disk', 'file_name', 'preview_url'])
          ->take(1);
      }])
      ->take(4)
      ->get()
      ->map(function ($relatedBillboard) {
        return [
          'id' => $relatedBillboard->id,
          'name' => $relatedBillboard->name,
          'location' => $relatedBillboard->location,
          'city' => $relatedBillboard->city,
          'country' => $relatedBillboard->country,
          'status' => $relatedBillboard->status,
          'monthly_rate' => $relatedBillboard->monthly_rate,
          'type' => $relatedBillboard->type,
          'is_available' => $relatedBillboard->is_available,
          'featured_image' => $relatedBillboard->getFirstMediaUrl('billboard_images'),
        ];
      });

    return view('pages.billboards.show', [
      'billboard' => $billboard,
      'structuredData' => $structuredData,
      'relatedBillboards' => $relatedBillboards
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
