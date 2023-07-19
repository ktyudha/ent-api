<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Response;

class UserApiController extends Controller
{
	public function index()
	{
		$user = auth()->id();
		// $user = User::find($user)->with('member')->first();
		return Response::json([
			'user' => $user,
		], 200);
	}
}
