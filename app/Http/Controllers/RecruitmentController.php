<?php

namespace App\Http\Controllers;

use App\Http\Resources\RecruitmentIndexResource;
use App\Models\Recruitment;
use Illuminate\Http\Request;

class RecruitmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$recruitments = Recruitment::OrderBy('id', 'DESC')->get();
        return RecruitmentIndexResource::collection($recruitments);
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
        // $recruitment = [
		// 	'name' => $request->name,
		// 	'strata' => $request->strata,
		// 	'prodi' => $request->prodi,
		// 	'place_of_birth' => $request->place_of_birth,
		// 	'date_of_birth' => $request->date_of_birth,
		// 	'gender' => $request->gender,
		// 	'religion' => $request->religion,
		// 	'boarding_address' => $request->boarding_address,
		// 	'home_address' => $request->home_address,
		// 	'email' => $request->email,
		// 	'phone' => $request->phone,
		// 	'mbti' => $request->mbti,
		// 	'motto' => $request->motto,
		// 	'interest' => $request->interest,
		// 	'division' => $request->division,
		// 	// 'experience_id' => $request->division,
		// ];
		$createRecruitment = Recruitment::create([
		'name' => $request->name,
		'strata' => $request->strata,
		'prodi' => $request->prodi,
		'place_of_birth' => $request->place_of_birth,
		'date_of_birth' => $request->date_of_birth,
		'gender' => $request->gender,
		'religion' => $request->religion,
		'boarding_address' => $request->boarding_address,
		'home_address' => $request->home_address,
		'email' => $request->email,
		'phone' => $request->phone,
		'mbti' => $request->mbti,
		'motto' => $request->motto,
		'interest' => $request->interest,
		'division' => $request->division
	]);
	// loadMissing(['experience:id,start_date, end_date, organization_name, position', 'achivement:id, name, date, achivement, level'])
		return new RecruitmentIndexResource($createRecruitment);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Api\Recruitment  $recruitment
     * @return \Illuminate\Http\Response
     */
    public function show(Recruitment $recruitment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Api\Recruitment  $recruitment
     * @return \Illuminate\Http\Response
     */
    public function edit(Recruitment $recruitment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Api\Recruitment  $recruitment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Recruitment $recruitment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Api\Recruitment  $recruitment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Recruitment $recruitment)
    {
        //
    }
}
