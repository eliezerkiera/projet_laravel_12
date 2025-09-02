<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    use HasFactory;


    public $timestamps =false;

    public const DEFAULT_LANGUAGE = "fr";



    public function countries()
    {
        return $this->hasMany(Country::class);
    }

}
