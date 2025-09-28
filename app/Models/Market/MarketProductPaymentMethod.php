<?php

namespace App\Models\Market;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class MarketProductPaymentMethod extends Model
{
    use HasFactory, HasTranslations;

    public $translatable = ['label'];

    protected $fillable = ['slug', 'label'];

    public function products()
    {
        return $this->hasMany(MarketProduct::class, 'market_product_payment_method_id');
    }
}
