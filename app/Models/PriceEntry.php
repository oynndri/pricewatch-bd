<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PriceEntry extends Model
{
    protected $table = 'price_entries';

    protected $fillable = [
        'product_id', 'market_id', 'price', 'submitted_by', 'date', 'verified',
    ];

    protected $casts = [
        'price' => 'float',
        'verified' => 'boolean',
        'date' => 'date',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function market()
    {
        return $this->belongsTo(Market::class);
    }

    // camelCase JSON keys for frontend
    public function toArray()
    {
        $array = parent::toArray();
        $result = [
            'id' => $array['id'] ?? null,
            'productId' => $array['product_id'] ?? $array['productId'] ?? null,
            'marketId' => $array['market_id'] ?? $array['marketId'] ?? null,
            'price' => (float)($array['price'] ?? 0),
            'submittedBy' => $array['submitted_by'] ?? $array['submittedBy'] ?? 'anonymous',
            'date' => $array['date'] ?? null,
            'verified' => (int)($array['verified'] ?? 0),
        ];

        // Include related data if loaded
        if (isset($array['product'])) {
            $result['product'] = $array['product']; 
        }

        if (isset($array['market'])) {
            $result['market'] = $array['market'];
        }

        return $result;
    }
}
