<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DispatchAgreement extends Model
{
    use HasFactory;

    protected $fillable = [
        'effective_date',
        'dispatch_fee',
        'carrier_name',
        'carrier_rep',
        'mc_number',
        'dot_number',
        'carrier_email',
        'carrier_phone',
        'notes',
        'poa',
    ];

    protected $casts = [
        'effective_date' => 'date',
    ];
}
