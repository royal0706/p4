@extends('layouts.master')

@section('title')
    Add Your Entry
@endsection

@section('content')

    <a href='/' class='nav'>View All Entries</a>

    <h2>Add Your Entry</h2>

    <form method='POST' action='/'>
        <div class='details'>* Required fields</div>
        {{ csrf_field() }}

        <label for='destination'>* Destination</label>
        <input type='text' name='destination' id='destination' value='{{ old('destination') }}'>
        @include('includes.error-field', ['fieldName' => 'title'])

        <label for='traveler_id'>* Your Name</label>
        <input type='text' name='traveler_id' id='traveler_id' value='{{ old('traveler_id') }}'>
        </select>
        @include('includes.error-field', ['fieldName' => 'traveler_id'])

        <label for='hotel'>* Hotel</label>
        <input type='text' name='hotel' id='hotel' value='{{ old('hotel') }}'>
        @include('includes.error-field', ['fieldName' => 'hotel'])

        <label for='meal'>* Best Meal</label>
        <input type='text' name='meal' id='meal' value='{{ old('meal') }}'>
        @include('includes.error-field', ['fieldName' => 'meal'])

        <label for='attraction'>* Best Attraction</label>
        <input type='text' name='attraction' id='attraction' value='{{ old('attraction') }}'>
        @include('includes.error-field', ['fieldName' => 'attraction'])

        <label for='photo_url'>* Photo URL </label>
        <input type='text' name='photo_url' id='photo_url' value='{{ old('photo_url') }}'>
        @include('includes.error-field', ['fieldName' => 'photo_url'])

        <label>Tags</label>
        @foreach($tags as $tag)
            <ul class='checkboxes'>
                <li>
                    <label>
                        <input type='checkbox'
                               name='tags[]'
                               value='{{ $tag->id }}'> {{ $tag->name }}
                    </label>
                </li>
            </ul>
        @endforeach

        <input type='submit' class='btn btn-primary' value='Add Your Entry'>
    </form>
    @if(count($errors) > 0)
        <div>Please fix the errors above.</div>
    @endif
@endsection