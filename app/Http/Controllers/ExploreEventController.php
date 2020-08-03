<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;
use Auth;
use App\Join;
class ExploreEventController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $exploreEvents = Event::all();
        $joins = Join::all();
        return view('exploreEvent.exploreEvent',compact('exploreEvents','joins'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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


    //  add member into event when click join 
    public function edit($id)
    {
       

    }

    public function join($id) {
        $user_id = Auth::id();
        $join = new Join;
        $event=event::find($id);
        $join->user_id = $user_id;
        $join->event_id = $event->id;
        $join->save();
        return back();
    }

    public function quit($id) {
        $join =Join::find($id);
        $join->delete();
        return back();
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
    public function destroy($id)
    {
        //
    }
}
