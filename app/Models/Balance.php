<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Balance extends Model
{
    use HasFactory;

    protected $fillable = [
        'colocation_id',
        'debtor_id',
        'creditor_id',
        'amount',
        'calculated_at',
    ];

    protected $casts = [
        'amount' => 'decimal:2',
        'calculated_at' => 'datetime',
    ];

    public function colocation(): BelongsTo
    {
        return $this->belongsTo(Colocation::class);
    }

    public function debtor(): BelongsTo
    {
        return $this->belongsTo(User::class, 'debtor_id');
    }

    public function creditor(): BelongsTo
    {
        return $this->belongsTo(User::class, 'creditor_id');
    }

    // Scope to get only positive balances (where debtor owes creditor)
    public function scopePositive($query)
    {
        return $query->where('amount', '>', 0);
    }

    // Scope to get balances for a specific colocation
    public function scopeForColocation($query, $colocationId)
    {
        return $query->where('colocation_id', $colocationId);
    }

    // Scope to get balances where a specific user is the debtor
    public function scopeWhereDebtor($query, $userId)
    {
        return $query->where('debtor_id', $userId);
    }

    // Scope to get balances where a specific user is the creditor
    public function scopeWhereCreditor($query, $userId)
    {
        return $query->where('creditor_id', $userId);
    }
}
