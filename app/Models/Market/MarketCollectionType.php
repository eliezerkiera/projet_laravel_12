<?php

namespace App\Models\Market;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class MarketCollectionType extends Model
{
    use HasFactory, HasTranslations;

    public $translatable = ['label'];

    protected $fillable = ['slug', 'label'];

    public function collections()
    {
        return $this->hasMany(MarketCollection::class, 'market_collection_type_id');
    }
}
