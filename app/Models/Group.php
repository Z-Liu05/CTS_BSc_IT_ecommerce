<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Group extends Model
{
    use HasFactory;

    /**
     * The Shipping that belong to the Group.
     */
    public function Shipping(): BelongsToMany
    {
        return $this->belongsToMany(Shipping::class, 'shipping_options')
        ->withPivot('id', 'status')
        ->withTimestamps();
    }

    public function scopeSelectedGroups(Builder $query, array $group_ids)
    {
        $query->whereIn('id', $group_ids);
    }

    protected $fillable = [
        'title',
    ];
}
