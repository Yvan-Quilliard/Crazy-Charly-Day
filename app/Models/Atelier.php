<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
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
        return $this->morphToMany(User::class, 'userable');
    }
}
