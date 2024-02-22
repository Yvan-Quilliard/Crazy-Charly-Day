<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
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

    public function themes(): BelongsTo
    {
        return $this->belongsTo(Theme::class);
    }

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'ateliers_users');
    }

    public function demands2ateliers(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'ateliers_demands');
    }

    public function demandsRefused(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'ateliers_demands_refused');
    }
}
