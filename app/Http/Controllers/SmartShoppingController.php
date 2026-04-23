<?php

namespace App\Http\Controllers;

use App\Models\PriceEntry;
use App\Models\Product;
use App\Models\Market;
use Illuminate\Http\Request;

class SmartShoppingController extends Controller
{
    // POST /api/smart-shopping
    public function calculate(Request $request)
    {
        $items = $request->input('items', []);
        $district = $request->input('district', '');

        if (empty($items)) {
            return response()->json(['error' => 'No items provided'], 400);
        }

        // Get relevant markets
        $marketsQuery = Market::query();
        if ($district) {
            $marketsQuery->where('district', $district);
        }
        $markets = $marketsQuery->get();

        if ($markets->isEmpty()) {
            return response()->json(['error' => 'No markets found in this district'], 404);
        }

        // For each market, calculate total cost
        $marketCosts = [];
        foreach ($markets as $market) {
            $totalCost = 0;
            $breakdown = [];
            $hasAllItems = true;

            foreach ($items as $item) {
                $productId = $item['productId'] ?? null;
                $quantity = $item['quantity'] ?? 1;

                if (!$productId) continue;

                // Get latest verified price for this product at this market
                $latestPrice = PriceEntry::where('product_id', $productId)
                    ->where('market_id', $market->id)
                    ->where('verified', 1)
                    ->orderBy('date', 'desc')
                    ->first();

                if ($latestPrice) {
                    $subtotal = $latestPrice->price * $quantity;
                    $totalCost += $subtotal;
                    $product = Product::find($productId);
                    $breakdown[] = [
                        'productId' => $productId,
                        'productName' => $product ? $product->name_en : 'Unknown',
                        'productNameBn' => $product ? $product->name : 'Unknown',
                        'icon' => $product ? $product->icon : '📦',
                        'unit' => $product ? $product->unit : '',
                        'price' => $latestPrice->price,
                        'quantity' => $quantity,
                        'subtotal' => round($subtotal, 2),
                    ];
                } else {
                    $hasAllItems = false;
                }
            }

            if (!empty($breakdown)) {
                $marketCosts[] = [
                    'market' => $market->toArray(),
                    'total' => round($totalCost, 2),
                    'itemsFound' => count($breakdown),
                    'itemsRequested' => count($items),
                    'hasAllItems' => $hasAllItems,
                    'breakdown' => $breakdown,
                ];
            }
        }

        // Sort by total cost
        usort($marketCosts, function ($a, $b) {
            return $a['total'] <=> $b['total'];
        });

        // Return top 10 cheapest markets
        $topMarkets = array_slice($marketCosts, 0, 10);

        return response()->json([
            'success' => true,
            'bestMarket' => !empty($topMarkets) ? $topMarkets[0] : null,
            'allMarkets' => $topMarkets,
            'totalItems' => count($items),
            'district' => $district,
        ]);
    }

    // GET /api/districts
    public function districts()
    {
        $districts = Market::select('district', 'division')
            ->distinct()
            ->orderBy('division')
            ->orderBy('district')
            ->get()
            ->map(function ($m) {
                return [
                    'district' => $m->district,
                    'division' => $m->division,
                ];
            });

        return response()->json($districts);
    }
}
