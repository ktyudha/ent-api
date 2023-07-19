<?php

namespace App\Http\Controllers;

use App\Http\Resources\AchivementResource;
use App\Models\Achivement;
use Illuminate\Http\Request;

class AchivementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $achivements = Achivement::OrderBy('id', 'DESC')->get();
        return AchivementResource::collection($achivements);
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
		$user = auth()->id();
		$achivement = Achivement::create([
			'recruitment_id' => $user,
			'date' => $request->date,
			'name' => $request->name,
			'achivement' => $request->achivement,
			'level' => $request->level,
		]);

		return new AchivementResource($achivement);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Achivement  $achivement
     * @return \Illuminate\Http\Response
     */
    public function show(Achivement $achivement)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Achivement  $achivement
     * @return \Illuminate\Http\Response
     */
    public function edit(Achivement $achivement)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Achivement  $achivement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Achivement $achivement)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Achivement  $achivement
     * @return \Illuminate\Http\Response
     */
    public function destroy(Achivement $achivement)
    {
        //
    }
}
