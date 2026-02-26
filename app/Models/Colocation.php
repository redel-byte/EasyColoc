<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Colocation extends Model
{
    use HasFactory;

    protected $table = 'colocation';

    public $timestamps = false;
    protected $fillable = [
        'name',
        'description',
        'create_at'
    ];
    public function Membership(): HasMany
    {
        return $this->hasMany(Membership::class);
    }

    public function Invitation(): HasMany
    {
        return $this->hasMany(Invitation::class);
    }

    public function Expense(): HasMany
    {
        return $this->hasMany(Expense::class);
    }

    public function Category(): HasMany
    {
        return $this->hasMany(Category::class);
    }

    public function balances(): HasMany
    {
        return $this->hasMany(Balance::class);
    }

    // Helper methods for business logic
    public function activeMembers()
    {
        return $this->belongsToMany(User::class, 'memberships')
            ->where('is_active', true)
            ->withPivot('role', 'joined_at');
    }

    public function owner()
    {
        return $this->belongsToMany(User::class, 'memberships')
            ->where('role', 'owner')
            ->where('is_active', true)
            ->first();
    }

    public function members()
    {
        return $this->belongsToMany(User::class, 'memberships')
            ->where('role', 'member')
            ->where('is_active', true)
            ->withPivot('joined_at');
    }

    public function isActive()
    {
        return $this->status === 'active';
    }

    public function isCancelled()
    {
        return $this->status === 'cancelled';
    }

    public function getMemberCount()
    {
        return $this->activeMembers()->count();
    }
}
