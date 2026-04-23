<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    // POST /api/auth/login
    public function login(Request $request)
    {
        $email = $request->email;
        $password = $request->password;

        $user = User::where('email', $email)->where('password', $password)->first();

        if (!$user) {
            return response()->json(['error' => 'Invalid credentials'], 401);
        }

        $safe = $user->toArray();
        session(['user' => $safe]);

        return response()->json(['success' => true, 'user' => $safe]);
    }

    // GET /api/auth/me
    public function me()
    {
        $user = session('user');
        if ($user) {
            return response()->json(['success' => true, 'user' => $user]);
        }
        return response()->json(['success' => false, 'error' => 'Not logged in'], 401);
    }

    // POST /api/auth/logout
    public function logout(Request $request)
    {
        $request->session()->forget('user');
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return response()->json(['success' => true]);
    }

    // POST /api/auth/register
    public function register(Request $request)
    {
        $name = $request->name;
        $email = $request->email;
        $password = $request->password;

        if (!$name || !$email || !$password) {
            return response()->json(['error' => 'Missing fields'], 400);
        }

        // Check duplicate
        $existing = User::where('email', $email)->first();
        if ($existing) {
            return response()->json(['error' => 'Email already registered'], 409);
        }

        $avatar = strtoupper(mb_substr($name, 0, 1));
        $joinDate = now()->format('Y-m-d');

        $user = User::create([
            'name' => $name,
            'email' => $email,
            'password' => $password,
            'role' => 'user',
            'contributions' => 0,
            'avatar' => $avatar,
            'join_date' => $joinDate,
        ]);

        $safe = $user->toArray();

        return response()->json(['success' => true, 'user' => $safe], 201);
    }
}
