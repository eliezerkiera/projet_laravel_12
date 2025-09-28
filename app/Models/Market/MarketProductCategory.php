<?php

namespace App\Models\Market;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class MarketProductCategory extends Model
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

    public function products()
    {
        return $this->hasMany(MarketProduct::class, 'market_product_category_id');
    }
}
