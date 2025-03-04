<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Contact extends Model
{
  protected $fillable = [
    'first_name',
    'last_name',
    'company',
    'email',
    'phone',
    'message',
    'billboard_id',
  ];

  public function billboard(): BelongsTo
  {
    return $this->belongsTo(Billboard::class);
  }
}
