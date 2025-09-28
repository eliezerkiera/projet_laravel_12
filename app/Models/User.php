<?php

namespace App\Models;

use App\Models\Market\MarketCollection;
use App\Models\Market\MarketProduct;
use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Observers\UserObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Storage;

#[ObservedBy([UserObserver::class])]
class User extends Authenticatable implements MustVerifyEmail
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'country_id',
        'language_id',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }


     public const AVATAR_PATH ='user/avatar';

    public function country()
    {

        return $this->belongsTo(Country::class);
    }

    public function language()
    {
        return $this->belongsTo(Language::class);
    }

    public function getAvatarUrl()
    {
        return Storage::disk('public')->url(self::AVATAR_PATH."/".$this->id.".png");
    }


    // Collections suivies
public function followedCollections()
{
    return $this->belongsToMany(MarketCollection::class, 'market_collection_user', 'user_id', 'market_collection_id')->withTimestamps();
}

// Produits enregistrés
public function savedProducts()
{
    return $this->belongsToMany(MarketProduct::class, 'market_product_user', 'user_id', 'market_product_id')->withTimestamps();
}
}
