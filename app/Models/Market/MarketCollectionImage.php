<?php

namespace App\Models\Market;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class MarketCollectionImage extends Model
{
      use HasFactory;

    protected $fillable = [
        'market_collection_id',
        'path',
        'is_default',
    ];

    /**
     * Relation to the collection
     */
    public function collection()
    {
        return $this->belongsTo(MarketCollection::class, 'market_collection_id');
    }

    /**
     * Get full URL for the image
     */
    public function getUrlAttribute()
    {
        return $this->path ? Storage::url($this->path) : asset('images/default-collection.png');
    }
}
