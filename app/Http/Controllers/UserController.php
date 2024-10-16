<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Handle login request
     */
    public function login(Request $request)
    {
        // Validasi input dari Flutter
        $request->validate([
            'nip' => 'required|string',
            'password' => 'required|string',
        ]);

        // Cari user berdasarkan NIP
        $user = User::where('nip', $request->nip)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            // Jika NIP atau password salah, kembalikan respon error
            return response()->json([
                'status' => 'error',
                'message' => 'NIP atau password salah'
            ], 401);
        }

        // Jika login berhasil, buat token untuk autentikasi
        $token = $user->createToken('auth_token')->plainTextToken;

        // Kembalikan respon sukses beserta token
        return response()->json([
            'status' => 'success',
            'message' => 'Login berhasil',
            'access_token' => $token,
            'token_type' => 'Bearer',
        ]);
    }

    /**
     * Handle logout request
     */
    public function logout(Request $request)
    {
        // Revoke token yang sedang digunakan
        $request->user()->tokens()->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Logout berhasil'
        ]);
    }

    //index
    public function index()
    {
        //search by name, pagination 10
        $users = User::where('name', 'like', '%' . request('name') . '%')
            ->orderBy('id', 'desc')
            ->paginate(10);
        return view('user.index', compact('users'));
    }

    //create
    public function create()
    {
        return view('user.create');
    }

    //store
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8',
            'nip' => 'required|string',
        ]);

        User::create([
            'name' => $request->name,
            'nip' => $request->nip,
            'email' => $request->email,
            'phone' => $request->phone,
            'roles' => $request->role,
            'password' => Hash::make($request->password),
            'position' => $request->position,
            'department' => $request->department,
        ]);

        return redirect()->route('user.index')->with('success', 'User created successfully');
    }

    //edit
    public function edit(User $user)
    {
        return view('user.edit', compact('user'));
    }

    //update
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'nip' => 'required',
        ]);

        $user->update([
            'name' => $request->name,
            'nip' => $request->nip,
            'email' => $request->email,
            'phone' => $request->phone,
            'roles' => $request->role,
            'position' => $request->position,
            'department' => $request->department,
        ]);

        //if password filled
        if ($request->password) {
            $user->update([
                'password' => Hash::make($request->password),
            ]);
        }

        return redirect()->route('user.index')->with('success', 'User updated successfully');
    }

    //destroy
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('user.index')->with('success', 'User deleted successfully');
    }
}
