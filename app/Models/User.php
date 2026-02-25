<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
        'is_admin',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function Membership(): HasMany
    {
        return $this->hasMany(Membership::class);
    }
    
    public function Expense(): HasMany
    {
        return $this->hasMany(Expense::class);
    }
    
    public function Invitation(): HasMany
    {
        return $this->hasMany(Invitation::class);
    }
    
    public function Payment(): HasMany
    {
        return $this->hasMany(Payment::class);
    }
    
    // Helper methods for business logic
    public function activeColocations()
    {
        return $this->belongsToMany(Colocation::class, 'memberships')
            ->where('is_active', true)
            ->withPivot('role', 'joined_at');
    }
    
    public function currentColocation()
    {
        return $this->activeColocations()->first();
    }
    
    public function hasActiveColocation()
    {
        return $this->Membership()->where('is_active', true)->exists();
    }
    
    public function isGlobalAdmin()
    {
        return $this->is_admin;
    }
    
    public function getFullNameAttribute()
    {
        return "{$this->first_name} {$this->last_name}";
    }
}
