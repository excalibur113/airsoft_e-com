<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
class UserController extends Controller
{
    public function index()
{
    $users = User::all();
    return response()->json($users);
}
public function store(Request $request)
{
    $validatedData = $request->validate([
        'name' => 'required',
        'email' => 'required|unique:users',
        'password' => 'required',
        'shipping_address' => 'required',
        'billing_address' => 'required',
        'payment_info' => 'required',
    ]);

    $user = User::create($validatedData);

    return response()->json(['message' => 'User created successfully', 'data' => $user]);
}
public function show($id)
{
    $user = User::findOrFail($id);
    return response()->json($user);
}
public function update(Request $request, $id)
{
    $validatedData = $request->validate([
        'name' => 'required',
        'email' => 'required|unique:users,email,'.$id,
        'shipping_address' => 'required',
        'billing_address' => 'required',
        'payment_info' => 'required',
    ]);

    $user = User::findOrFail($id);
    $user->update($validatedData);

    return response()->json(['message' => 'User updated successfully', 'data' => $user]);
}
public function destroy($id)
{
    $user = User::findOrFail($id);
    $user->delete();

    return response()->json(['message' => 'User deleted successfully']);
}

}
