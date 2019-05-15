@extends('layouts.master')

@section('title')
    Travel Journal
@endsection

@section('head')

@endsection

@section('content')

    <section>
        <h1>Travel Journal</h1>


    <h2><a href='/trips/create'> Add your trip!</a></h2>

    @foreach($trips as $trip)
        @include ('trips._trip')
    @endforeach

    </section>

    {{-- <h2>Search</h2>

        <form method='GET' action='/books/search-process'>

            <fieldset>
                <label for='searchTerm'>Search by Destination:</label>
                <input type='text' name='searchTerm' id='searchTerm' >
                @include('includes.error-field', ['fieldName'=>'searchTerm'])
                <input type='submit' value='Search' class='btn btn-primary'>
            </fieldset>

            @if($searchTerm)
                <h2>Results for query: <em>{{ $searchTerm }}</em></h2>

                @if(count($searchResults) == 0)
                    No matches found.
                @else
                    @foreach($searchResults as $destination => $trip)
                        <div class='book'>
                            <h3>{{ $destination }}</h3>
                        </div>
    @endforeach
    @endif
    @endif --}}


@endsection