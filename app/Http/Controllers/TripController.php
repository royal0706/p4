<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Trip;
use App\Tag;

class TripController extends Controller
{
    public function index()
    {
        $trips = Trip::orderBy('created_at')->get();

        return view('trips.index')->with([
            'trips' => $trips
        ]);
    }

    public function show($id)
    {
        $trip = Trip::find($id);

        if (!$trip) {
            return redirect('/')->with(['alert' => 'The trip you were looking for was not found.']);
        }

        return view('trips.show')->with([
            'trip' => $trip
        ]);
    }

    public function create()
    {
        $tags = Tag::getForCheckboxes();

        return view('trips.create')->with([
            'tags' => $tags
        ]);
    }

    public function store(Request $request)
    {
        # Validate the request data
        $request->validate([
            'destination' => 'required',
            'traveler_id' => 'required',
            'hotel' => 'required',
            'meal' => 'required',
            'attraction' => 'required',
            'photo_url' => 'required',
        ]);

        $trip = new Trip();

        $trip->destination = $request->destination;
        $trip->traveler_id = $request->traveler_id;
        $trip->hotel = $request->hotel;
        $trip->meal = $request->meal;
        $trip->attraction = $request->attraction;
        $trip->photo_url = $request->photo_url;
        $trip->save();

        $trip->tags()->sync($request->tags);

        return redirect('/trips/create')->with(['alert' => 'Your trip to ' . $trip->destination . ' was added.']);
    }

    public function edit($id)
    {
        $trip = Trip::with('tags')->find($id);

        if (!$trip) {
            return redirect('/')->with([
                'alert' => 'Trip not found.'
            ]);
        }

        $tags = Tag::getForCheckboxes();

        $tripTags = $trip->tags->pluck('id')->toArray();

        return view('trips.edit')->with([
            'trip' => $trip,
            'tags' => $tags,
            'tripTags' => $tripTags,
        ]);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'destination' => 'required',
            'traveler_id' => 'required',
            'hotel' => 'required',
            'meal' => 'required',
            'attraction' => 'required',
            'photo_url' => 'required'
        ]);

        $trip = Trip::find($id);

        $trip->tags()->sync($request->tags);

        $trip->destination = $request->input('destination');
        $trip->traveler_id = $request->input('traveler_id');
        $trip->hotel = $request->input('hotel');
        $trip->meal = $request->input('meal');
        $trip->attraction = $request->input('attraction');
        $trip->photo_url = $request->input('photo_url');
        $trip->save();

        return redirect('/trips/' . $id . '/edit')->with([
            'alert' => 'Your changes were saved.'
        ]);
    }

    public function read($id)
    {
        $trip = Trip::find($id);

        if (!$trip) {
            return redirect('/')->with(['alert' => 'The trip you were looking for was not found.']);
        }

        return view('trips.read')->with([
            'trip' => $trip
        ]);
    }

}

