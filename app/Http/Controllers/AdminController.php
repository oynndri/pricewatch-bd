<?php

namespace App\Http\Controllers;

use App\Models\PriceEntry;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    // GET /api/admin/pending-prices
    public function pendingPrices()
    {
        $rows = PriceEntry::with(['product', 'market'])
            ->where('verified', 0)
            ->orderBy('date', 'desc')
            ->get()
            ->map(function ($entry) {
                return [
                    'id' => $entry->id,
                    'productName' => $entry->product->name ?? $entry->product->name_en ?? 'Unknown',
                    'marketName' => $entry->market->name ?? $entry->market->name_en ?? 'Unknown',
                    'price' => $entry->price,
                    'submittedBy' => $entry->submitted_by,
                    'date' => $entry->date->format('Y-m-d'),
                    'verified' => $entry->verified,
                ];
            });

        return response()->json($rows->values()->all());
    }

    // POST /api/admin/verify-price/{id}
    public function verifyPrice(Request $request, $id)
    {
        $action = $request->action;

        if ($action === 'approve') {
            PriceEntry::where('id', $id)->update(['verified' => 1]);
            return response()->json(['success' => true, 'message' => 'Price verified']);
        } elseif ($action === 'reject') {
            PriceEntry::destroy($id);
            return response()->json(['success' => true, 'message' => 'Price rejected and removed']);
        }

        return response()->json(['error' => 'Invalid action'], 400);
    }

    // GET /api/admin/stats
    public function stats()
    {
        $pendingCount = PriceEntry::where('verified', 0)->count();
        return response()->json(['pendingCount' => $pendingCount]);
    }
}
