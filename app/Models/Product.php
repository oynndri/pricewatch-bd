<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name', 'name_en', 'category', 'unit', 'icon', 'description',
    ];

    public function priceEntries()
    {
        return $this->hasMany(PriceEntry::class);
    }

    // camelCase JSON keys for frontend
    public function toArray()
    {
        $array = parent::toArray();
        return [
            'id' => $array['id'] ?? null,
            'name' => $array['name'] ?? null,
            'nameEn' => $array['name_en'] ?? $array['nameEn'] ?? null,
            'category' => $array['category'] ?? null,
            'unit' => $array['unit'] ?? null,
            'icon' => $array['icon'] ?? null,
            'description' => $array['description'] ?? null,
        ];
    }
}
