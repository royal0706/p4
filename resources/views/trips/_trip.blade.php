<div class='trips'>
    <img class='trip' src='{{ $trip->photo_url }}' alt='Photo of {{ $trip->destination }}'>
    <h2>{{ $trip->destination }}</h2>
    <ul>
        <li>Your Hotel: {{ $trip->hotel }} </li>
        <li>Can't Miss Meal: {{ $trip->meal }} </li>
        <li>Must Do Attraction: {{ $trip->attraction }} </li>
        <li>Entry by {{ $trip->traveler_id }} {{ $trip->created_at->format('m/d/y') }}</li>
    </ul>

    <div class='tripActions'>
        <ul>
            <li><a href='trips/{{ $trip->id }}/edit'>Edit Entry</a></li>
            <li><a href='trips/create'>Add Your Entry</a></li>
        </ul>
    </div>

</div>