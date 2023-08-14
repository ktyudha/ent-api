<?php

namespace App\Http\Controllers;

use Ramsey\Uuid\Uuid;
use App\Models\Recruitment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Resources\RecruitmentIndexResource;

class RecruitmentController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$recruitments = Recruitment::with(['experience', 'achivement']) // Memuat relasi experience dan achivement
			->orderBy('id', 'DESC')
			->get();

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

		DB::beginTransaction();

		try {
			$user = auth()->id();
			$uuid = Uuid::uuid4();

			$request->validate([
				'name' => ['required', 'unique:recruitments'],
				'nrp' => ['required', 'unique:recruitments'],
				'email' => ['required', 'unique:recruitments'],
			]);

			$recruitment = Recruitment::create([
				'id' => $uuid->toString(),
				'user_id' => $user,
				'name' => strtolower($request->name),
				'nrp' => $request->nrp,
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
				'division' => $request->division,
				'reason' => $request->reason,
				'description' => $request->description,
				'url_portofolio' => $request->url_portofolio,
			]);

			$experiences = $request->input('experiences'); // array of experience data
			if ($experiences) {
				foreach ($experiences as $experienceData) {
					$recruitment->experience()->create([
						'recruitment_id' => $recruitment->id,
						'start_date' => $experienceData['start_date'],
						'end_date' => $experienceData['end_date'],
						'organization_name' => $experienceData['organization_name'],
						'position' => $experienceData['position'],
					]);
				}
			}

			$achievements = $request->input('achivements'); // array of achievement data
			if ($achievements) {
				foreach ($achievements as $achievementData) {
					$recruitment->achivement()->create([
						'recruitment_id' => $recruitment->id,
						'date' => $achievementData['date'],
						'title' => $achievementData['title'],
						'achivement' => $achievementData['achivement'],
						'level' => $achievementData['level'],
					]);
				}
			}

			DB::commit();
		} catch (\Exception $e) {
			DB::rollBack();
		}
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \App\Models\Api\Recruitment  $recruitment
	 * @return \Illuminate\Http\Response
	 */
	public function show(Recruitment $recruitment)
	{
		$recruitment = Recruitment::with(['experience', 'achivement'])->findOrFail($recruitment->id);
		return new RecruitmentIndexResource($recruitment);
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
