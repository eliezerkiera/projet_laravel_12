<?php

namespace App\Models\Market;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class MarketProductImage extends Model
{
    use HasFactory;

    protected $fillable = [
        'market_product_id',
        'path',
        'is_default',
    ];

    /**
     * Relation to the product
     */
    public function product()
    {
        return $this->belongsTo(MarketProduct::class, 'market_product_id');
    }

    /**
     * Get full URL for the image
     */
    public function getUrlAttribute()
    {
        return $this->path ? Storage::url($this->path) : asset('images/default-product.png');
    }
}
