<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use Illuminate\Http\Request;

class LoginController extends Controller
{
	/**
	 * Handle the incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function __invoke(Request $request)
	{
		$credentials = $request->validate([
			'email' => ['required'],
			'password' => ['required'],
		]);

		if (auth()->attempt($credentials)) {
			$user = auth()->user();

			return (new UserResource($user))->additional([
				'token' => $user->createToken('myAppToken')->plainTextToken,
			]);
		}

		return response()->json([
			'message' => 'Your credential does not match.',
		], 401);
	}

	// public function login(Request $request)
    // {
    //     $request->validate([
    //         'email' => 'required|email',
    //         'password' => 'required',
    //     ]);

    //     $user = User::where('email', $request->email)->first();
    //     // dd($user);
    //     if (! $user || ! Hash::check($request->password, $user->password)) {
    //         throw ValidationException::withMessages([
    //             'email' => ['The provided credentials are incorrect.'],
    //         ]);
    //     }

    //     return $user->createToken('userlogin')->plainTextToken;
	// }
}
