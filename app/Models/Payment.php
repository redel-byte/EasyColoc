<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Payment extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'colocation_id',
        'payer_id',
        'receiver_id',
        'amount',
        'payment_date',
        'is_marked',
    ];

    protected $casts = [
        'amount' => 'decimal:2',
        'payment_date' => 'date',
        'is_marked' => 'boolean',
    ];
    
    public function payer(): BelongsTo
    {
        return $this->belongsTo(User::class, 'payer_id');
    }
    
    public function receiver(): BelongsTo
    {
        return $this->belongsTo(User::class, 'receiver_id');
    }
    
    public function colocation(): BelongsTo
    {
        return $this->belongsTo(Colocation::class);
    }
}
