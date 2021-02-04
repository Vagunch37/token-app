<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Token;
use App\Http\Resources\User as UserResource;

class UserController extends Controller
{

    public function index(Request $request)
    {
        if (Token::where('token', $request->token)->exists()) {
            $users = User::all();
            return UserResource::collection($users);
        } else {
            abort(404);
        }
    }
}
