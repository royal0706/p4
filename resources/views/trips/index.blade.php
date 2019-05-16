@extends('layouts.master')

@section('title')
    Travel Journal
@endsection

@section('head')

@endsection

@section('content')

    <section>

        <p>Looking for inspiration for your next destination? Read through the travel journal entries below, edit entries, and a new entry for your last trip below.</p>


        <p><a href='trips/create' class='nav'>Add Your Entry</a></p>


        @foreach($trips as $trip)
            @include ('trips._trip')
        @endforeach

    </section>

@endsection