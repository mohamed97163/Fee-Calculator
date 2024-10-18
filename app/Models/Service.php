<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Service extends Model
{
    use HasFactory;

    protected $fillable= 
    [
        'name',
        'percent'
    ];

    protected $hidden =
    [
        'created_at',
        'updated_at'
    ];
    public function feePercentage() : HasMany
    {
        return $this->hasMany(FeePercentage::class);
    }
}
