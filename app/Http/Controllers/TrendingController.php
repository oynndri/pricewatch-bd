<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\PriceEntry;

class TrendingController extends Controller
{
    // GET /api/trending
    public function index()
    {
        $products = Product::all();

        $trending = $products->map(function ($p) {
            $avg = PriceEntry::where('product_id', $p->id)
                ->where('verified', 1)
                ->avg('price');
            $trendData = ProductController::calculateTrend($p->id);
            $arr = $p->toArray();
            $arr['avgPrice'] = $avg ? round($avg) : null;
            $arr['trend'] = $trendData['trend'];
            $arr['history'] = $trendData['history'];
            return $arr;
        })->filter(function ($item) {
            return !empty($item['history']) && $item['avgPrice'] > 0;
        })->sortByDesc(function ($item) {
            return abs($item['trend']);
        })->values();

        return response()->json($trending);
    }
}
