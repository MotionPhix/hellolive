<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Contact extends Model
{
  use HasFactory;

  protected $fillable = [
    'first_name',
    'last_name',
    'company',
    'email',
    'phone',
    'message',
    'billboard_uuid',
  ];

  public function billboard(): BelongsTo
  {
    return $this->belongsTo(Billboard::class, 'billboard_uuid', 'uuid');
  }
}
