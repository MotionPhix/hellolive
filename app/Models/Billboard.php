<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Billboard extends Model implements HasMedia
{
  use InteractsWithMedia;

  protected $fillable = [
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

  public function registerMediaCollections(): void
  {
    $this->addMediaCollection('billboard_images')
      ->useFallbackUrl('/images/placeholder.jpg')
      ->useFallbackPath(public_path('/images/placeholder.jpg'));
  }
}
