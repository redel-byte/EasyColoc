<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Expense extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'colocation_id',
        'payer_id',
        'category_id',
        'title',
        'amount',
        'expence_date',
    ];

    protected $casts = [
        'amount' => 'decimal:2',
        'expence_date' => 'date',
    ];
    
    public function Membership(): BelongsTo
    {
        return $this->belongsTo(Membership::class);
    }
    public function User(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function Category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
    public function Colocation(): BelongsTo
    {
        return $this->belongsTo(Colocation::class);
    }
    //logic function
    public function DepensesGlobal(){
        return $this->hasManyThrough(Payment::class, User::class, 'id', 'payer_id', 'user_id');
    }
}
