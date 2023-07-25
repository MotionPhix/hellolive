<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Contact extends Model
{
  use HasFactory;

  public function company(): BelongsTo
  {
    return $this->belongsTo(Company::class);
  }

  public function user(): BelongsTo
  {
    return $this->belongsTo(User::class);
  }

  public function users(): BelongsToMany
  {
    return $this->belongsToMany(User::class, 'contact_user')
      ->withPivot(['from_date', 'to_date'])
      ->withTimestamps();
  }

  public function companies(): BelongsToMany
  {
    return $this->belongsToMany(Company::class, 'company_contact')
      ->withPivot(['from_date', 'to_date'])
      ->withTimestamps();
  }

  public function projects(): HasMany
  {
    return $this->hasMany(Project::class);
  }

  public function phones(): MorphMany
  {
    return $this->morphMany(Phone::class, 'phoneable');
  }

  public function scopeOrderByName(Builder $query)
  {
    $query->orderBy('first_name')->orderBy('last_name');
  }

  public function scopeForUser(Builder $query, User $user)
  {
    $query->whereHas('users', function ($query) use ($user) {
      $query->where('user_id', $user->id);
    })->with(['company' => function ($query) {
      $query->select('companies.id', 'companies.name');
    }])->select(['id', 'first_name', 'last_name', 'status', 'email', 'company_id']);
  }

  public function total()
  {
    return $this->forUser(auth()->user())->count();
  }
}
