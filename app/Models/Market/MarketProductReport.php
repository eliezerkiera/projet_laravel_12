<?php

namespace App\Models\Market;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MarketProductReport extends Model
{
    use HasFactory;

    protected $fillable = ['user_id','market_product_id','market_product_report_reason_id','description','status'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function market_product()
    {
        return $this->belongsTo(MarketProduct::class, 'market_product_id');
    }

     public function market_product_report_reason()
    {
        return $this->belongsTo(MarketProductReportReason::class, 'market_product_report_reason_id');
    }


}
