<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\PriceEntry;

class ProfileController extends Controller
{
    // GET /api/users/profile
    public function show()
    {
        $sessionUser = session('user');
        if (!$sessionUser) {
            return response()->json(['error' => 'Not logged in'], 401);
        }

        $userId = $sessionUser['id'];
        $user = User::find($userId);

        if (!$user) {
            return response()->json(['error' => 'User not found'], 404);
        }

        $userName = $user->name;
        $submissions = PriceEntry::where('submitted_by', $userName)->count();
        $verified = PriceEntry::where('submitted_by', $userName)->where('verified', 1)->count();

        $result = $user->toArray();
        $result['stats'] = [
            'submissions' => $submissions,
            'verified' => $verified,
        ];

        return response()->json([
            'success' => true,
            'user' => $result,
        ]);
    }
}
