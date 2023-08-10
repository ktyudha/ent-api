<?php

namespace App\Http\Controllers;

use App\Models\Recruitment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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

        DB::beginTransaction();

        try {
$user = auth()->id();
        $recruitment = Recruitment::create([
			'user_id'=>$user,
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
		'division' => $request->division,
		'reason' => $request->reason,
		'description' => $request->description,
	]);


       $recruitment->experience()->create([
			'recruitment_id' => $recruitment->id,
			'start_date'=> $request->start_date,
			'end_date'=> $request->end_date,
			'organization_name'=> $request->organization_name,
			'position'=> $request->position,
		]);

		 $recruitment->achivement()->create([
			'recruitment_id' => $recruitment->id,
			'date' => $request->date,
			'title' => $request->title,
			'achivement' => $request->achivement,
			'level' => $request->level,
		]);

    DB::commit();

        } catch (\Exception $e) {
			DB::rollBack();
            //throw $th;
        }




	// loadMissing(['experience:id,start_date, end_date, organization_name, position', 'achivement:id, name, date, achivement, level'])
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Api\Recruitment  $recruitment
     * @return \Illuminate\Http\Response
     */
    public function show(Recruitment $recruitment)
    {
        $recruitment = Recruitment::with(['experience:id,start_date,end_date,organization_name,position','achivement:id,date,title,achivement,level'])->findOrFail($recruitment->id);
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
