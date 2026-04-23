<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\PriceEntry;
use Illuminate\Http\Request;

class PredictionController extends Controller
{
    // GET /api/predictions/{productId}
    public function show($productId)
    {
        $product = Product::find($productId);
        if (!$product) {
            return response()->json(['error' => 'Product not found'], 404);
        }

        // Get last 14 days of prices grouped by date
        $entries = PriceEntry::where('product_id', $productId)
            ->where('verified', 1)
            ->where('date', '>=', now()->subDays(14))
            ->orderBy('date', 'asc')
            ->get()
            ->groupBy(function ($e) {
                return $e->date->format('Y-m-d');
            });

        $history = [];
        $dates = [];
        foreach ($entries as $date => $group) {
            $dates[] = $date;
            $history[] = round($group->avg('price'), 2);
        }

        if (count($history) < 2) {
            return response()->json([
                'product' => $product->toArray(),
                'history' => $history,
                'historyDates' => $dates,
                'predictions' => [],
                'trend' => 'stable',
                'confidence' => 0,
                'dailyChange' => 0,
            ]);
        }

        // Calculate average daily change (simple linear regression)
        $n = count($history);
        $sumX = 0; $sumY = 0; $sumXY = 0; $sumX2 = 0;
        for ($i = 0; $i < $n; $i++) {
            $sumX += $i;
            $sumY += $history[$i];
            $sumXY += $i * $history[$i];
            $sumX2 += $i * $i;
        }
        $denominator = ($n * $sumX2 - $sumX * $sumX);
        $slope = $denominator != 0 ? ($n * $sumXY - $sumX * $sumY) / $denominator : 0;
        $intercept = ($sumY - $slope * $sumX) / $n;
        $mean = $sumY / $n;

        // Generate 7-day forward predictions with dampening
        $predictions = [];
        $predictionValues = [];
        // Bound the initial slope to max 10% movement per day
        $bound = $mean * 0.10;
        if ($slope > $bound) $slope = $bound;
        if ($slope < -$bound) $slope = -$bound;
        
        $currentSlope = $slope;
        
        $lastPredicted = end($history);
        for ($day = 1; $day <= 7; $day++) {
            // Apply dampening to the slope so it curves out instead of going infinite
            $currentSlope *= 0.85; 
            $predictedPrice = round($lastPredicted + $currentSlope, 2);
            // hard floor at 50% of mean
            $predictedPrice = max($mean * 0.5, $predictedPrice);
            
            $predictions[] = [
                'date' => now()->addDays($day)->format('Y-m-d'),
                'predicted' => $predictedPrice,
            ];
            $predictionValues[] = $predictedPrice;
            $lastPredicted = $predictedPrice;
        }

        // Confidence based on data consistency
        $variance = 0;
        foreach ($history as $v) {
            $variance += pow($v - $mean, 2);
        }
        $stdDev = sqrt($variance / $n);
        $cv = $mean > 0 ? $stdDev / $mean : 0;
        $confidence = round(max(0, min(1, 1 - $cv * 5)), 2);

        $trend = $slope > 0.5 ? 'rising' : ($slope < -0.5 ? 'falling' : 'stable');

        return response()->json([
            'product' => $product->toArray(),
            'history' => $history,
            'historyDates' => $dates,
            'predictions' => $predictions,
            'predictionValues' => $predictionValues,
            'trend' => $trend,
            'confidence' => $confidence,
            'dailyChange' => round($slope, 2),
            'currentAvg' => round($mean),
        ]);
    }
}
