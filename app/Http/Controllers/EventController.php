<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\YourEvent;
use App\Event;
use Auth;
class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Event::all();
        return view('event.eventview',compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $events = Event::all();
        return view('your_event.view_your_event', compact('events', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request -> validate([
            'title' => 'required',
            'start_date' => 'required|date|date_format:Y-m-d|after:yesterday',
            'start_time' => 'required',
            'end_date' => 'required|date|date_format:Y-m-d|after:startDate',
            'end_time' => 'required',
            'description' => 'required',
            'city' => 'required',
        ]);
        $user = Auth::id();
        $yourevent = new Event;
        $yourevent -> title = $request-> title;
        $yourevent -> category_id = $request-> category;
        $yourevent -> start_date = $request-> start_date;
        $yourevent -> end_date = $request-> end_date;
        $yourevent -> start_time = $request-> start_time;
        $yourevent -> end_time = $request-> end_time;
        $yourevent -> city = $request-> city;
        $yourevent -> description = $request-> description;
        $yourevent->user_id = auth::id();
        if($request->picture != null){ 
            request()->validate([
                'picture' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                ]);
                $imageName = time().'.'.request()->picture->getClientOriginalExtension();
                request()->picture->move(public_path('/image/'), $imageName);
                $yourevent->picture = $imageName;

            }

    
        $yourevent->save();
        return back();
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
    public function destroy($id)
    {
        //
    }
}