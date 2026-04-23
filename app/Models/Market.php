<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Market extends Model
{
    protected $fillable = [
        'name', 'name_en', 'location', 'district', 'division',
        'latitude', 'longitude', 'rating', 'verified', 'type',
        'total_prices', 'description',
    ];

    protected $casts = [
        'rating' => 'float',
        'verified' => 'boolean',
        'total_prices' => 'integer',
        'latitude' => 'float',
        'longitude' => 'float',
    ];

    public function priceEntries()
    {
        return $this->hasMany(PriceEntry::class);
    }

    public function toArray()
    {
        $array = parent::toArray();
        return [
            'id' => $array['id'] ?? null,
            'name' => $array['name'] ?? null,
            'nameEn' => $array['name_en'] ?? null,
            'location' => $array['location'] ?? null,
            'district' => $array['district'] ?? null,
            'division' => $array['division'] ?? null,
            'latitude' => (float)($array['latitude'] ?? 0),
            'longitude' => (float)($array['longitude'] ?? 0),
            'rating' => (float)($array['rating'] ?? 0),
            'verified' => (int)($array['verified'] ?? 0),
            'type' => $array['type'] ?? null,
            'totalPrices' => (int)($array['total_prices'] ?? 0),
            'description' => $array['description'] ?? null,
        ];
    }
}
