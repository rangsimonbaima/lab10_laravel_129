<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;



class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }

    public function register(Request $request) {
        $fileds = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users|string',
            'password' => 'required|string|confirmed',
            'role' => 'required|integer', 
        ]);
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => $request->role,
        ]);

        $token = $user->createToken($request->userAgent(),[$fileds['role']])->plainTextToken;

        $reponse = [
            'user'=> $user,
            'token'=> $token
        ];
        return response($reponse,201);
    }

    public function login(Request $request) {
        $fileds =$request -> validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        $user = User::where('email', $fileds['email'])->first();

        if(!$user || !Hash::check($fileds['password'], $user->password)) {
            return response([
                'message' => 'Invalid Login',
            ],401);
        } else {
            $user->tokens()->delete();
            $token = $user->createToken($request->userAgent(), ["$user->role"])->plainTextToken;

            $reponse = [
                'user'=> $user,
                'token'=> $token,
            ];
            return response($reponse,201);
        }
    }
    public function logout(Request $request) {
        $request->user()->currentAccessToken()->delete();

        return response([
            'message' => 'Logged Out',
        ], 200);
    }
}
