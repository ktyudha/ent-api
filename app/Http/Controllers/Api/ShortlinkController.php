<?php

namespace App\Http\Controllers\Api;

use Ramsey\Uuid\Uuid;
use App\Models\Shortlink;
use App\Models\Recruitment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\ShortlinkSources;

class ShortlinkController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$shortlinks = Shortlink::orderBy('created_at', 'DESC')->get();

		return ShortlinkSources::collection($shortlinks);
	}

	/**
	 * Show the form for Shortlinkeating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly Shortlinkeated resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{

		try {
			$request->validate([
				'short_url' => ['required', 'unique:shortlinks'],
			]);

			$uuid = Uuid::uuid4();

			$shortlink = Shortlink::create([
				'id' => $uuid->toString(),
				'dst_url' => $request->dst_url,
				'short_url' => $request->short_url,
			]);

			return response()->json([
				'message' => 'Your Submit tes Success',
				'id' => $shortlink->id,
			], 200);
		} catch (\Exception $e) {
			return response()->json([
				'message' => 'Your Submit form Failed. Please try again',
			], 400);
		}
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \App\Models\Shortlink  $shortlink
	 * @return \Illuminate\Http\Response
	 */
	public function show($short_url)
	{
		$shortlink = Shortlink::where('short_url', $short_url)->first();
		return new ShortlinkSources($shortlink);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\Models\Shortlink  $shortlink
	 * @return \Illuminate\Http\Response
	 */
	public function edit(Shortlink $shortlink)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \App\Models\Shortlink  $Shortlink
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, Shortlink $shortlink)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Models\Shortlink  $shortlink
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(Shortlink $shortlink)
	{
		$shortlink->delete();
		// return new ShortlinkSources($shortlink);
		return response()->json([
			'message' => 'Delete Successfully',
		], 200);
	}
}
