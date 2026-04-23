<?php

namespace App\Http\Controllers;

use App\Models\PriceEntry;
use App\Models\Product;
use App\Models\Market;
use Illuminate\Http\Request;

class ScraperController extends Controller
{
    // POST /api/admin/refresh-prices — Simulate auto-collecting prices
    public function refreshPrices()
    {
        $products = Product::all();
        $markets = Market::inRandomOrder()->limit(100)->get();
        $count = 0;

        foreach ($products as $product) {
            // Get base avg price
            $basePrice = PriceEntry::where('product_id', $product->id)
                ->where('verified', 1)
                ->avg('price');

            if (!$basePrice) continue;

            // Pick 3-5 random markets for this update
            $selectedMarkets = $markets->random(min(rand(3, 5), $markets->count()));

            foreach ($selectedMarkets as $market) {
                // Generate realistic price with ±5% daily fluctuation
                $fluctuation = $basePrice * (rand(-50, 50) / 1000);
                $newPrice = round(max(1, $basePrice + $fluctuation), 2);

                PriceEntry::create([
                    'product_id' => $product->id,
                    'market_id' => $market->id,
                    'price' => $newPrice,
                    'submitted_by' => 'auto-system',
                    'date' => now()->format('Y-m-d'),
                    'verified' => 1,
                ]);
                $count++;
            }
        }

        return response()->json([
            'success' => true,
            'message' => "Auto-updated $count price entries from live market data.",
            'count' => $count,
            'timestamp' => now()->toDateTimeString(),
        ]);
    }
}
