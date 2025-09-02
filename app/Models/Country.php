<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Country extends Model
{
   use HasFactory;

    public $timestamps = false;

    public const DEFAULT_COUNTRY='bf';


    public function currency()
    {
        return $this->belongsTo(Currency::class);
    }


    public function language()
    {
        return $this->belongsTo(Language::class);
    }


    public function getFlagUrl()
    {
        return Storage::disk('public')->url('country/'.$this->code.'.png');
    }
}
