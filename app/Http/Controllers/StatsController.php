<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Market;
use App\Models\PriceEntry;
use App\Models\User;

class StatsController extends Controller
{
    // GET /api/stats
    public function index()
    {
        return response()->json([
            'totalProducts' => Product::count(),
            'totalMarkets' => Market::count(),
            'totalPriceUpdates' => PriceEntry::where('verified', 1)->count(),
            'totalUsers' => User::count(),
        ]);
    }

    // GET /api/contributors
    public function contributors()
    {
        $rows = User::where('contributions', '>', 0)
            ->orderBy('contributions', 'desc')
            ->take(5)
            ->get(['name', 'avatar', 'contributions']);

        return response()->json($rows->map(function ($u) {
            return [
                'name' => $u->name,
                'avatar' => $u->avatar,
                'contributions' => $u->contributions,
            ];
        }));
    }
}
