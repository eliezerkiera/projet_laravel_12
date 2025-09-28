<?php

namespace App\Models\Market;

use App\Models\Country;
use App\Models\User;
use App\Policies\MarketCollectionPolicy;
use Illuminate\Database\Eloquent\Attributes\UsePolicy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


#[UsePolicy(MarketCollectionPolicy::class)]
class MarketCollection extends Model
{
     use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'contact_email',
        'contact_phone',
        'state',
        'city',
        'cover_image',
        'slug',
        'status',
        'user_id',
        'country_id',
        'market_collection_type_id',
        'market_collection_category_id',
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
        return $this->belongsTo(MarketCollectionType::class, 'market_collection_type_id');
    }

    public function category()
    {
        return $this->belongsTo(MarketCollectionCategory::class, 'market_collection_category_id');
    }

    public function products()
    {
        return $this->belongsToMany(MarketProduct::class, 'market_collection_product', 'market_collection_id', 'market_product_id');
    }

    public function images()
{
    return $this->hasMany(MarketCollectionImage::class, 'market_collection_id');
}

public function defaultImage()
{
    return $this->hasOne(MarketCollectionImage::class, 'market_collection_id')->where('is_default', true);
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


// Utilisateurs qui suivent la collection
public function followers()
{
    return $this->belongsToMany(User::class, 'market_collection_user', 'market_collection_id', 'user_id')->withTimestamps();
}
}
