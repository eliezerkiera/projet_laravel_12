<?php

namespace App\Models\Market;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class MarketCollectionCategory extends Model
{
    use HasFactory, HasTranslations;

    public $translatable = ['label'];

    protected $fillable = ['slug', 'label', 'parent_id'];

    // Self-referencing relationship for subcategories
    public function parent()
    {
        return $this->belongsTo(MarketProductCategory::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(MarketProductCategory::class, 'parent_id');
    }

    public function collections()
    {
        return $this->hasMany(MarketCollection::class, 'market_collection_category_id');
    }
}
