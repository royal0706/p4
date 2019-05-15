@extends('layouts.master')

@section('title')
    Add Your Trip
@endsection

@section('content')


    <h1>Add Your Trip</h1>

    <form method='POST' action='/trips'>
        <div class='details'>* Required fields</div>
        {{ csrf_field() }}

        <label for='title'>* Destination</label>
        <input type='text' name='title' id='title' value='{{ old('title') }}'>
        @include('includes.error-field', ['fieldName' => 'title'])

        <label for='traveler_id'>* Your Name</label>
        <select name='traveler_id'>
            <input type='text' name='traveler_id' id='traveler_id' value='{{ old('traveler_id') }}'>
        </select>
        @include('includes.error-field', ['fieldName' => 'traveler_id'])

        <label for='hotel'>* Hotel</label>
        <input type='text' name='hotel' id='hotel'  value='{{ old('hotel') }}'>
        @include('includes.error-field', ['fieldName' => hotel'])

        <label for='meal'>* Best Meal</label>
        <input type='text' name='meal' id='meal'  value='{{ old('meal') }}'>
        @include('includes.error-field', ['fieldName' => 'meal'])

        <label for='attraction'>* Best Attraction</label>
        <input type='text' name='attraction' id='attraction'  value='{{ old('attraction') }}'>
        @include('includes.error-field', ['fieldName' => 'attraction'])

        <label for='photo_url'>* Photo URL </label>
        <input type='text' name='photo_url' id='photo_url' value='{{ old('photo_url') }}'>
        @include('includes.error-field', ['fieldName' => 'photo_url'])

        <input type='submit' class= 'btn btn-primary' value='Add book'>
    </form>
    @if(count($errors) > 0)
        <div>Please fix the errors above.</div>
    @endif
@endsection