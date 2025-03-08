<?php

namespace App\Models;

use App\Traits\HasBootUuid;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Billboard extends Model implements HasMedia
{
  use InteractsWithMedia, HasBootUuid, HasFactory;

  protected $fillable = [
    'uuid',
    'name',
    'location',
    'city',
    'state',
    'country',
    'status',
    'description',
    'dimensions',
    'latitude',
    'longitude',
    'monthly_rate',
    'type',
  ];

  protected $casts = [
    'latitude' => 'float',
    'longitude' => 'float',
    'monthly_rate' => 'decimal:2',
    'dimensions' => 'array',
  ];

  protected $appends = [
    'is_available',
    'featured_image'
  ];

  // Add the is_available accessor
  protected function isAvailable(): Attribute
  {
    return Attribute::make(
      get: fn () => $this->status === 'available',
    );
  }

  protected function featuredImage(): Attribute
  {
    return Attribute::make(
      get: function () {
        $media = $this->media()->orderBy('order_column')->first();

        if ($media) {
          return $media->preview_url;
        }

        return asset('images/placeholder.jpg');
      }
    );
  }

  public function registerMediaCollections(): void
  {
    $this->addMediaCollection('billboard_images')
      ->useFallbackUrl('/images/placeholder.jpg')
      ->useFallbackPath(public_path('/images/placeholder.jpg'));
  }

  public function registerMediaConversions(Media $media = null): void
  {
    $this->addMediaConversion('thumb')
      ->width(400)
      ->height(300)
      ->sharpen(10)
      ->nonQueued();

    $this->addMediaConversion('preview')
      ->width(800)
      ->height(600)
      ->sharpen(10)
      ->nonQueued();
  }
}
