<?php

namespace App\Http\Controllers\Api;

use Ramsey\Uuid\Uuid;
use App\Models\Shortlink;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\NotulensiResource;
use App\Models\Notulensi;

class NotulensiController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$notulensis = Notulensi::orderBy('created_at', 'DESC')->get();

		return NotulensiResource::collection($notulensis);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		try {
			$request->validate([
				'title' => ['required'],
			]);


			$notulensi = Notulensi::create([
				'title' => $request->title,
				'url_gdocs' => $request->url_gdocs,
				'place' => $request->place,
				'category' => $request->category,
			]);

			return response()->json([
				'message' => 'Your Submit tes Success',
				'id' => $notulensi->id,
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
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(Notulensi $notulensi)
	{
		$notulensi->delete();
		// return new ShortlinkSources($shortlink);
		return response()->json([
			'message' => 'Delete Successfully',
		], 200);
	}
}
