<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\PriceEntry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Calculate trend dynamically from price_entries table.
     * Returns [trend_percent, history_array]
     */
    public static function calculateTrend($productId)
    {
        $entries = PriceEntry::where('product_id', $productId)
            ->where('verified', 1)
            ->where('date', '>=', now()->subDays(7))
            ->orderBy('date', 'asc')
            ->get()
            ->groupBy(function ($e) {
                return $e->date->format('Y-m-d');
            });

        if ($entries->count() < 2) {
            return ['trend' => 0, 'history' => []];
        }

        $history = [];
        foreach ($entries as $date => $group) {
            $history[] = round($group->avg('price'));
        }

        // Ensure we have at least 2 data points
        if (count($history) < 2) {
            return ['trend' => 0, 'history' => $history];
        }

        $first = $history[0];
        $last = end($history);
        $trend = $first > 0 ? round((($last - $first) / $first) * 100, 1) : 0;

        return ['trend' => $trend, 'history' => $history];
    }

    // GET /api/products
    public function index(Request $request)
    {
        $query = Product::query();

        if ($request->has('category') && $request->category) {
            $query->where('category', $request->category);
        }
        if ($request->has('q') && $request->q) {
            $q = $request->q;
            $query->where(function ($qb) use ($q) {
                $qb->where('name_en', 'LIKE', "%{$q}%")
                    ->orWhere('name', 'LIKE', "%{$q}%");
            });
        }

        $products = $query->get();

        $enriched = $products->map(function ($p) {
            $avg = PriceEntry::where('product_id', $p->id)
                ->where('verified', 1)
                ->avg('price');
            $trendData = self::calculateTrend($p->id);
            $arr = $p->toArray();
            $arr['avgPrice'] = $avg ? round($avg) : null;
            $arr['trend'] = $trendData['trend'];
            $arr['history'] = $trendData['history'];
            return $arr;
        });

        return response()->json($enriched->values());
    }

    // GET /api/products/{id}
    public function show($id)
    {
        $product = Product::find($id);
        if (!$product) {
            return response()->json(['error' => 'Product not found'], 404);
        }

        $avg = PriceEntry::where('product_id', $id)
            ->where('verified', 1)
            ->avg('price');

        $prices = PriceEntry::with('market')
            ->where('product_id', $id)
            ->orderBy('date', 'desc')
            ->limit(50)
            ->get();

        $trendData = self::calculateTrend($id);

        $result = $product->toArray();
        $result['avgPrice'] = $avg ? round($avg) : null;
        $result['trend'] = $trendData['trend'];
        $result['history'] = $trendData['history'];
        $result['prices'] = $prices->toArray();

        return response()->json($result);
    }

    // POST /api/products
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:100',
            'nameEn' => 'required|string|max:100',
            'category' => 'required|string|max:50',
            'unit' => 'required|string|max:20',
            'icon' => 'required|string|max:10',
            'description' => 'nullable|string',
        ]);

        $product = Product::create([
            'name' => $data['name'],
            'name_en' => $data['nameEn'],
            'category' => $data['category'],
            'unit' => $data['unit'],
            'icon' => $data['icon'],
            'description' => $data['description'] ?? '',
        ]);

        return response()->json(['success' => true, 'id' => $product->id], 201);
    }

    // PUT /api/products/{id}
    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $product->update([
            'name' => $request->name,
            'name_en' => $request->nameEn,
            'category' => $request->category,
            'unit' => $request->unit,
            'icon' => $request->icon,
            'description' => $request->description,
        ]);

        return response()->json(['success' => true]);
    }

    // DELETE /api/products/{id}
    public function destroy($id)
    {
        Product::destroy($id);
        return response()->json(['success' => true]);
    }
}
