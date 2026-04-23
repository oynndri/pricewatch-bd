<?php

namespace App\Http\Controllers;

use App\Models\Market;
use App\Models\PriceEntry;
use Illuminate\Http\Request;

class MarketController extends Controller
{
    // GET /api/markets
    public function index(Request $request)
    {
        $query = Market::query();

        if ($request->has('district') && $request->district) {
            $query->whereRaw('LOWER(district) = ?', [strtolower($request->district)]);
        }
        if ($request->has('type') && $request->type) {
            $query->where('type', $request->type);
        }

        return response()->json($query->get());
    }

    // GET /api/markets/{id}
    public function show($id)
    {
        $market = Market::find($id);
        if (!$market) {
            return response()->json(['error' => 'Market not found'], 404);
        }

        $prices = PriceEntry::with('product')
            ->where('market_id', $id)
            ->get();

        $result = $market->toArray();
        $result['prices'] = $prices->toArray();

        return response()->json($result);
    }

    // POST /api/markets
    public function store(Request $request)
    {
        $market = Market::create([
            'name' => $request->name,
            'name_en' => $request->nameEn,
            'location' => $request->location,
            'district' => $request->district,
            'rating' => $request->rating ?? 0,
            'verified' => $request->verified ?? 0,
            'type' => $request->type,
            'description' => $request->description ?? '',
        ]);

        return response()->json(['success' => true, 'id' => $market->id], 201);
    }

    // PUT /api/markets/{id}
    public function update(Request $request, $id)
    {
        $market = Market::findOrFail($id);
        $market->update([
            'name' => $request->name,
            'name_en' => $request->nameEn,
            'location' => $request->location,
            'district' => $request->district,
            'rating' => $request->rating,
            'verified' => $request->verified,
            'type' => $request->type,
            'description' => $request->description,
        ]);

        return response()->json(['success' => true]);
    }

    // DELETE /api/markets/{id}
    public function destroy($id)
    {
        Market::destroy($id);
        return response()->json(['success' => true]);
    }
}
