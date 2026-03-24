<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAuthRequest;
use App\Models\User;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function register(StoreUserRequest $reques)
    {
        $user = User::create($reques->all());
        return response()->json(['token' => $user->createToken('api')->plainTextToken], 201);
    }

    public function login(StoreAuthRequest $reques)
    {
        $user = User::where('email', $reques->email)->first();
        if ($user) {
            if (Hash::check($reques->password, $user->password)) {
                return response()->json(['token' => $user->createToken('api')->plainTextToken]);
            }
        }
        return response()->json(['errors' => ['email' => ['ошибка входа']]]);
    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();
        return response()->json(['massage' => 'выход выполнен']);
    }

    public function user()
    {
        return response()->json(Auth::user());
    }

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
    public function store(StoreUserRequest $request)
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
    public function update(UpdateUserRequest $request, User $user)
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
}
