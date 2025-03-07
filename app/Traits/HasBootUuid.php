<?php

namespace App\Traits;

use Illuminate\Support\Str;

trait HasBootUuid
{
  public static function bootHasBootUuid()
  {
    static::creating(function ($model) {
      $model->uuid = Str::orderedUuid();
    });

    static::updating(function ($model) {
      if (! $model->uuid) $model->uuid = Str::orderedUuid();
    });
  }
}
