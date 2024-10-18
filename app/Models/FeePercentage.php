<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class FeePercentage extends Model
{
    use HasFactory;

    protected $fillable =[
        'fee_preset_id',
        'service_id',
        'threshold_id',
        'percentage'
    ];

    protected $hidden =
    [
        'created_at',
        'updated_at'
    ];

    public function feePreset() : BelongsTo
    {
        return $this->belongsTo(FeePreset::class);
    }
    public function service() : BelongsTo
    {
        return $this->belongsTo(Service::class);
    }
    public function threshold() : BelongsTo
    {
        return $this->belongsTo(Threshold::class);
    }
}
