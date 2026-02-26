<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = [
        'name',
        'description',
        'colocation_id',
        'create_at',
    ];


    public function Expense(): HasMany
    {
        return $this->hasMany(Expense::class);
    }
}
