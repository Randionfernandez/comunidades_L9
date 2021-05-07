<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Community;
use App\Http\Requests\SaveCommunityRequest;

class CommunityController extends Controller
{
    public function __construct() {
        $this->middleware('auth')->except('index', 'show');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('communities.index', [ // llamamos al Modelo
            'communities' => Community::orderBy('id', 'asc')->latest()->paginate()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('communities.create',[ 'community' => new Community]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SaveCommunityRequest $request)
    {
        
        Community::create($request->validated());
        
        return redirect()->route('communities.index')->with('status', 'La comunidad fué creada con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $Community
     * @return \Illuminate\Http\Response
     */
    public function show(Community $community)
    {        
        return view('communities.show', [
            'community' => $community
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Project  $Community
     * @return \Illuminate\Http\Response
     */
    public function edit(Community $community)
    {
        return view('communities.edit', [
            'community' => $community
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Project $Community
     * @return \Illuminate\Http\Response
     */
    public function update(Community $community, SaveCommunityRequest $request)
    {
        $community->update();
        
        return redirect()->route('communities.show', $community);
        //->with('status', 'La comunidad fué actualizada con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $Community
     * @return \Illuminate\Http\Response
     */
    public function destroy(Community $community)
    {
        $community->delete();
        return redirect()->route('communities.index', $community);
        // ->with('status', 'La comunidad fué eliminada con éxito');
    }
}
