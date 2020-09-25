<?php

namespace App\Http\Controllers;

use App\Player;
use App\Repository\PlayerRepository;
use Illuminate\Http\Request;

class PlayerController extends Controller
{
    private $repo;
    private $player;
    /**
     * PlayerController constructor.
     */
    public function __construct()
    {
        $this->repo = new PlayerRepository();
        $this->player = new Player();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       return response(Player::all());
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
            'cpf'=>'required',
            'shirt_numbering'=>'required',
            'yellow_cards'=>'nullable',
            'red_cards'=>'nullable',
            'team_id'=>'required'
        ]);
        $data=$request->all();
        $repo=$this->repo;

        return response($repo->store($data));

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Player  $player
     * @return \Illuminate\Http\Response
     */
    public function show(Player $player)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Player  $player
     * @return \Illuminate\Http\Response
     */
    public function edit(Player $player)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Player  $player
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $uuid)
    {
        $request->validate([
            'name'=>'required',
            'cpf'=>'required',
            'shirt_numbering'=>'required',
            'yellow_cards'=>'nullable',
            'red_cards'=>'nullable',
            'team_id'=>'required'
        ]);

        $repo=$this->repo;
        $data=$request->all();

        return $repo->update($data, $uuid);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Player  $player
     * @return \Illuminate\Http\Response
     */
    public function destroy(Player $player)
    {
        //
    }
}
