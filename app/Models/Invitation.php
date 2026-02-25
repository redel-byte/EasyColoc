<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Invitation extends Model
{
    use HasFactory;
    
    public $timestamps = false;
    public function User(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function inviter(): BelongsTo
    {
        return $this->belongsTo(User::class, 'inviter_id');
    }
    public function Colocation(): BelongsTo
    {
        return $this->belongsTo(Colocation::class);
    }
}
