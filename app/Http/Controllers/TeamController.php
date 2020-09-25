<?php

namespace App\Http\Controllers;

use App\Repository\TeamRepository;
use App\Team;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    /**
     * TeamController constructor.
     */
    public function __construct()
    {
        $this->repo = new TeamRepository();
        $this->player = new Team();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Team::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'name'=>'required',
            'players_id'=>'required',
            'win'=>'nullable',
            'draw'=>'nullable',
            'looses'=>'nullable'
        ]);
        $data=$request->all();


        return $this->repo->store($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param $uuid
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $uuid)
    {
        $request->validate([
            'name'=>'required',
            'players_id'=>'required',
            'win'=>'nullable',
            'draw'=>'nullable',
            'looses'=>'nullable'
        ]);

        $repo=$this->repo;
        $data=$request->all();

        return $repo->update($data, $uuid);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function destroy(Team $team)
    {
        //
    }
}
