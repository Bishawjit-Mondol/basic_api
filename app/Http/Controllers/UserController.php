<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();

        return response()->json([
            'msg' => count($users) . ' User data found',
            'data' => $users,
            'status' => true
        ]);
    }

    public function show($id)
    {
        $user = User::find($id);
        if (!empty($user)) {
            return response()->json([
                'msg' => 'Specific user info found',
                'data' => $user,
                'status' => true
            ], 200);
        } else {
            return response()->json([
                'msg' => 'User info not found',
                'data' => [],
                'status' => true
            ], 200);
        }
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
        ]);


        if ($validator->fails()) {
            return response()->json([
                'msg' => 'Please fix the errors',
                'errors' => $validator->errors(),
                'status' => false
            ], 200);
        }

        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->save();

        return response()->json([
            'msg' => 'Inserted Successfully',
            'data' => $user,
            'status' => true
        ], 200);
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);

        if (empty($user)) {
            return response()->json([
                'msg' => 'NO INFORMATION FOUND',
                'status' => false
            ], 200);
        }

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'msg' => 'Please fix the errors',
                'errors' => $validator->errors(),
                'status' => false
            ], 200);
        }

        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();

        return response()->json([
            'msg' => 'Info Updated',
            'data' => $user,
            'status' => true
        ], 200);
    }

    public function destroy($id)
    {
        $user = User::find($id);

        if (empty($user)) {
            return response()->json([
                'msg' => 'NO INFORMATION FOUND',
                'status' => false
            ], 200);
        }

        $user->delete();

        return response()->json([
            'msg' => 'Info Deleted',
            'status' => true
        ], 200);
    }
}
