<?php

namespace App\Http\Controllers;

use App\Models\PriceEntry;
use App\Models\Market;
use App\Models\User;
use Illuminate\Http\Request;

class PriceController extends Controller
{
    // GET /api/prices
    public function index(Request $request)
    {
        $query = PriceEntry::with(['product', 'market']);

        if ($request->has('productId') && $request->productId) {
            $query->where('product_id', (int)$request->productId);
        }
        if ($request->has('marketId') && $request->marketId) {
            $query->where('market_id', (int)$request->marketId);
        }
        if ($request->has('verified')) {
            $query->where('verified', (int)$request->verified);
        }

        return response()->json($query->get());
    }

    // POST /api/prices
    public function store(Request $request)
    {
        $productId = $request->productId;
        $marketId = $request->marketId;
        $price = $request->price;

        if (!$productId || !$marketId || !$price) {
            return response()->json(['error' => 'Missing fields'], 400);
        }

        // Auto-verify if admin
        $sessionUser = session('user');
        $isAdmin = $sessionUser && ($sessionUser['role'] ?? '') === 'admin';
        $verifiedStatus = $isAdmin ? 1 : 0;

        $submittedBy = $request->submittedBy ?: ($sessionUser['name'] ?? 'anonymous');
        $date = now()->format('Y-m-d');

        $entry = PriceEntry::create([
            'product_id' => (int)$productId,
            'market_id' => (int)$marketId,
            'price' => (float)$price,
            'submitted_by' => $submittedBy,
            'date' => $date,
            'verified' => $verifiedStatus,
        ]);

        // Bump totalPrices on market
        Market::where('id', (int)$marketId)->increment('total_prices');

        // Bump contributions for user
        if ($submittedBy !== 'anonymous') {
            User::where('name', $submittedBy)->increment('contributions');
        }

        return response()->json([
            'success' => true,
            'verified' => (bool)$verifiedStatus,
            'entryId' => $entry->id,
        ], 201);
    }

    // PUT /api/prices/{id}
    public function update(Request $request, $id)
    {
        $entry = PriceEntry::findOrFail($id);
        $entry->update([
            'price' => $request->price,
            'verified' => $request->verified,
        ]);

        return response()->json(['success' => true]);
    }

    // DELETE /api/prices/{id}
    public function destroy($id)
    {
        PriceEntry::destroy($id);
        return response()->json(['success' => true]);
    }
}
