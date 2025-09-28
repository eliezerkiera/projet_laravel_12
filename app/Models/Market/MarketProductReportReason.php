<?php

namespace App\Models\Market;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class MarketProductReportReason extends Model
{
    use HasFactory, HasTranslations;

    public $translatable = ['label'];

    protected $fillable = ['slug', 'label'];

    public function market_product_reports()
    {
        return $this->hasMany(MarketProductReport::class, 'market_product_report_reason_id');

    }
}
