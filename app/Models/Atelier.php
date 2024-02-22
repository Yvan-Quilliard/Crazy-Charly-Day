<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class Atelier extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'capacity',
        'date',
        'description',
    ];

    public function themes(): BelongsToMany
    {
        return $this->belongsToMany(Theme::class);
    }

    public function users(): MorphToMany
    {
        return $this->morphToMany(User::class, 'atelier2user');
    }

    public function demands2ateliers(): HasMany
    {
        return $this->hasMany(Demand2Atelier::class);
    }

    public function demandsRefused(): HasMany
    {
        return $this->hasMany(DemandRefused::class);
    }
}
