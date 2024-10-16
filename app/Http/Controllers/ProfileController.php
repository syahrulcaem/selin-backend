<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class ProfileController extends Controller
{
        public function getProfile(Request $request)
    {
        $user = $request->user(); // Mengambil user dari token auth

        return response()->json([
            'name' => $user->name,
            'nip' => $user->nip,
            'email' => $user->email,
            'phone' => $user->phone,
            'position' => $user->position,
        ]);
    }
}
