<?php

namespace App\Http\Controllers;

use App\Models\Token;
use Illuminate\Http\Request;

class TokenController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Request $request)
    {
        
        $user = $request->user();
        

        do {
            $token = \Str::random(32);
        } while ( 
            Token::where('token', $token )->exists()
        );

        Token::create([
            'user_id' => $user->id,
            'token' => $token,
        ]);

        return redirect(route('home'));
        
    }

    public function destroy(Token $token)
    {
        $token->delete();
        return redirect(route('home'));
    }
}
