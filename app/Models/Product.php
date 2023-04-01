<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;
    use HasFactory;
    protected $fillable =[
            'ProductName',
            'ProductCode',
            'categoriesId',
            'ProductPrice',
            'DiscountPrice',
            'AfterDiscount',
            'ShortDescription',
            'LongDescription',
            'ProductQuantity',
            'ProductImage',
            'is_active',
    ];
}
