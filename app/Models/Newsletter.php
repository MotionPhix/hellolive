<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Newsletter extends Model
{
  use HasFactory;

  protected $fillable = [
    'email',
    'status',
    'ip_address',
    'unsubscribe_token',
    'unsubscribed_at',
  ];

  protected $casts = [
    'unsubscribed_at' => 'datetime',
  ];

  protected static function boot()
  {
    parent::boot();

    static::creating(function ($newsletter) {
      $newsletter->unsubscribe_token = Str::random(32);
    });
  }

  public function scopeActive($query)
  {
    return $query->where('status', 'subscribed');
  }
}
