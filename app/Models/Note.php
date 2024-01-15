<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Note extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function scopeSearchWithKeyword(Builder $query, string $keyword): void
    {
        $query->where('title', 'like', "%{$keyword}%")
            ->orWhere('description', 'like', "%{$keyword}%");
    }

    public function isOwnedBy(User|int $user): bool
    {
        return $this->user_id == modelId($user);
    }
}
