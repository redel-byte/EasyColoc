<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Membership extends Model
{
    use HasFactory;
    public function Colocation(): BelongsTo
    {
        return $this->belongsTo(Colocation::class);
    }
    
    public function User(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    
    // Helper methods for business logic
    public function isOwner()
    {
        return $this->role === 'owner';
    }
    
    public function isMember()
    {
        return $this->role === 'member';
    }
    
    public function isActive()
    {
        return $this->is_active;
    }
    
    public function activate()
    {
        $this->is_active = true;
        $this->save();
    }
    
    public function deactivate()
    {
        $this->is_active = false;
        $this->save();
    }
    
    public function getRoleDisplayName()
    {
        return ucfirst($this->role);
    }
}
