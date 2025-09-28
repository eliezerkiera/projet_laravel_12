<?php

namespace App\Models\Market;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MarketCollectionReport extends Model
{
     use HasFactory;

    protected $fillable = ['user_id','market_product_id','market_product_report_reason_id','description','status'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function market_collection()
    {
        return $this->belongsTo(MarketCollection::class, 'market_collection_id');
    }

     public function market_collection_report_reason()
    {
        return $this->belongsTo(MarketCollectionReportReason::class, 'market_collection_report_reason_id');
    }


}
