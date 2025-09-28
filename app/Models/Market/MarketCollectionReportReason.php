<?php

namespace App\Models\Market;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class MarketCollectionReportReason extends Model
{
    use HasFactory, HasTranslations;

    public $translatable = ['label'];

    protected $fillable = ['slug', 'label'];

    public function market_collection_reports()
    {
        return $this->hasMany(MarketCollectionReport::class, 'market_collection_report_reason_id');

    }
}
