<?php

namespace App\Models;

use App\Traits\HasBootUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quote extends Model
{
  use HasFactory, HasBootUuid;

  protected $fillable = [
    'billboard_uuid',
    'name',
    'email',
    'phone',
    'company',
    'start_date',
    'duration',
    'message',
  ];

  protected $casts = [
    'start_date' => 'date',
    'duration' => 'integer',
  ];

  public function billboard()
  {
    return $this->belongsTo(Billboard::class, 'billboard_uuid', 'uuid');
  }
}
