<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();

        return response()->json($users);
    }

    public function show($id)
    {
        $user = User::find($id);

        return response()->json($user);
    }

    public function update(Request $request, $id)
    {
        $data = $request->only([
            'name',
            'email',
        ]);

        try {
            $user = User::find($id);
            $user->update($data);
            $result = [
                'message' => true,
            ];
        } catch (Exception $e) {
            $result = [
                'message' => false,
            ];
        }

        return response()->json($result);
    }

    public function store(Request $request)
    {
        $data = $request->only([
            'name',
            'email',
            'password',
        ]);

        $data['password'] = bcrypt($data['password']);

        try {
            User::create($data);
            $result = [
                'message' => true,
            ];
        } catch (Exception $e) {
            $result = [
                'message' => false,
            ];
        }

        return response()->json($result);
    }

    public function destroy($id)
    {
        try {
            $user = User::find($id);
            $user->delete();
            $result = [
                'status' => true,
            ];
        } catch (Extention $e) {
            $result = [
                'status' => false,
            ];
        }

        return response()->json($result);
    }
}
