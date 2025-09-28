<?php

namespace App\Models\Market;

use App\Models\Country;
use App\Models\Currency;
use App\Models\User;
use App\Policies\MarketProductPolicy;
use Illuminate\Database\Eloquent\Attributes\UsePolicy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

#[UsePolicy(MarketProductPolicy::class)]
class MarketProduct extends Model
{
    use HasFactory;

    protected $fillable = [
       'title',
        'description',
        'price',
        'condition_percentage', // was working_state
        'contact_email',
        'contact_phone',
        'state',
        'city',
        'slug',
        'status',
        'user_id',
        'country_id',
        'market_product_type_id',
        'market_product_category_id',
        'market_product_payment_method_id',
        'currency_id',
    ];

    // Relations

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function type()
    {
        return $this->belongsTo(MarketProductType::class, 'market_product_type_id');
    }

    public function category()
    {
        return $this->belongsTo(MarketProductCategory::class, 'market_product_category_id');
    }

    public function paymentMethod()
    {
        return $this->belongsTo(MarketProductPaymentMethod::class, 'market_product_payment_method_id');
    }

    public function currency()
    {
        return $this->belongsTo(Currency::class);
    }

    public function collections()
    {
        return $this->belongsToMany(MarketCollection::class, 'market_collection_product', 'market_product_id', 'market_collection_id');
    }


    public function images()
{
    return $this->hasMany(MarketProductImage::class, 'market_product_id');
}

public function defaultImage()
{
    return $this->hasOne(MarketProductImage::class, 'market_product_id')->where('is_default', true);
}

public function getDefaultImageUrlAttribute()
{
    // Return the URL of the default image if exists
    if ($this->defaultImage) {
        return \Storage::url($this->defaultImage->path);
    }

    // Otherwise, return a placeholder image
    return asset('images/default-product.png'); // Place a default image in public/images
}


// <img src="{{ $product->default_image_url }}" alt="{{ $product->title }}">
// <img src="{{ $collection->default_image_url }}" alt="{{ $collection->name }}">



// Utilisateurs qui ont enregistré le produit
public function savedByUsers()
{
    return $this->belongsToMany(User::class, 'market_product_user', 'market_product_id', 'user_id')->withTimestamps();
}
}
