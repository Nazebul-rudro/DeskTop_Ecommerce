<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Specialoffers extends Model
{
    use SoftDeletes;
    use HasFactory;
    protected $table = 'specialoffers';
    protected $fillable = ([
        "OfferName",
        "OfferDiscount",
        "OfferImage",
        'is_active'
    ]);
}
