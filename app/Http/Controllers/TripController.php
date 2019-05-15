<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Trip;

class TripController extends Controller
{
    public function index()
    {
        $trips = Trip::orderBy('created_at')->get();

        return view('trips.index')->with([
            'trips' => $trips,
        ]);
    }

    /*public function show($id)
    {
        $book = Trip::find($id);

        if (!$trip) {
            return redirect('/trips')->with(['alert' => 'The book you were looking for was not found.']);
        }

        return view('books.show')->with([
            'book' => $book
        ]);
    }
*/

#GET books/create
    public function create()
    {
        return view('trips.create')->with([
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
            'photo_url' => 'required'
        ]);

        #$author = Author::find($request->author_id)->first();

        # Instantiate a new Book Model object
        $trip = new Trip();

        # Set the properties
        # Note how each property corresponds to a field in the table
        $trip->destination = $request->destination;
        $trip->traveler_id = $request->traveler_id;
        $trip->hotel = $request->hotel;
        $trip->meal = $request->meal;
        $trip->attraction = $request->attraction;
        $trip->photo_url = $request->photo_upload;
        $trip->save();

        # Note: If validation fails, it will redirect the visitor back to the form page
        # and none of the code that follows will execute.

        # Code will eventually go here to add the book to the database,
        # but for now we'll just dump the form data to the page for proof of concept
        return redirect('/trips/create')->with(['alert' => 'The book ' . $trip->destination . ' was added.']);
    }

    /*
    * GET /books/{id}/edit
    */
    public function edit($id)
    {
        $trip = Trip::find($id);

        if (!$trip) {
            return redirect('/')->with([
                'alert' => 'Book not found.'
            ]);
        }

        return view('trips.edit')->with([
            'trip'=> $trip,
        ]);
    }

    /*
    * PUT /books/{id}
    */
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

        $trip->destination = $request->input(destination);
        $trip->traveler_id = $request->input(traveler_id);
        $trip->hotel = $request->input(hotel);
        $trip->meal = $request->input(meal);
        $trip->attraction = $request->input(attraction);
        $trip->photo_url = $request->input(photo_url);
        $book->save();

        return redirect('/trips/' . $id . '/edit')->with([
            'alert' => 'Your changes were saved.'
        ]);
    }
}
/*
    public function search(Request $request)
    {
        $searchTerm = $request->session()->get('searchTerm', '');
        $caseSensitive = $request->session()->get('caseSensitive', false);
        $searchResults = $request->session()->get('searchResults', null);

        return view('books.search')->with([
            'searchTerm' => $searchTerm,
            'caseSensitive' => $caseSensitive,
            'searchResults' => $searchResults,
        ]);
    }

    public function searchProcess(Request $request)
    {
        $request->validate([
            'searchTerm' => 'required'
        ]);
        # Start with an empty array of search results; books that
        # match our search query will get added to this array
        $searchResults = [];

        # Store the searchTerm in a variable for easy access
        # The second parameter (null) is what the variable
        # will be set to *if* searchTerm is not in the request.
        $searchTerm = $request->input('searchTerm', null);

        # Only try and search *if* there's a searchTerm
        if ($searchTerm) {
            # Open the books.json data file
            # database_path() is a Laravel helper to get the path to the database folder
            # See https://laravel.com/docs/helpers for other path related helpers
            $result = Trip::where('title', '=', $searchTerm)->get();

            dd($result);
        }

        # Redirect back to the search page w/ the searchTerm *and* searchResults (if any) stored in the session
        # Ref: https://laravel.com/docs/redirects#redirecting-with-flashed-session-data
        return redirect('/index')->with([
            'searchTerm' => $searchTerm,
            'caseSensitive' => $request->has('caseSensitive'),
            'searchResults' => $searchResults
        ]);
    }

} */
