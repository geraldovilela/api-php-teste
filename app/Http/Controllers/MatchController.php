<?php

namespace App\Http\Controllers;

use App\Match;
use App\Player;
use App\Repository\MatchRepository;
use App\Repository\PlayerRepository;
use Illuminate\Http\Request;
use function GuzzleHttp\Promise\all;

class MatchController extends Controller
{
    private $repo;
    private $match;

    /**
     * MatchController constructor.
     */
    public function __construct()
    {

        $this->repo = new MatchRepository();
        $this->match = new Match();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Match::all();
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
           'match_start'=>'required',
           'match_end'=>'required',
           'home_team'=>'required',
           'visitor'=>'required',
           'scoreboard'=>'required'
        ]);
        $data=$request->all();
        $this->repo->store($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Match  $match
     * @return \Illuminate\Http\Response
     */
    public function show(Match $match)
    {
        //
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Match  $match
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $uuid)
    {
        $request->validate([
            'match_start'=>'required',
            'match_end'=>'required',
            'home_team'=>'required',
            'visitor'=>'required',
            'scoreboard'=>'required'
        ]);

        $data=$request->all();
        $repo=$this->repo;
        return $repo->update($data, $uuid );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Match  $match
     * @return \Illuminate\Http\Response
     */
    public function destroy(Match $match)
    {
        //
    }
}
