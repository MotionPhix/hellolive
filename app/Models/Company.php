<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
  use HasFactory;

  public function contacts()
  {
    return $this->hasMany(Contact::class);
  }

  public function projects()
  {
    return $this->hasMany(Project::class);
  }

  public function phones()
  {
    return $this->morphMany(Phone::class, 'phoneable');
  }

  public function scopeOrderByName(Builder $query)
  {
    return $query->orderBy('name');
  }
}
