<div class='trips'>
    <img class='cover' src='{{ $trip->photo_url }}' alt='Cover image for the book {{ $trip->destination }}'>
    <h3>{{ $trip->destination }}</h3>
    <ul>
        <li>Your Hotel: {{ $trip->hotel }} </li>
        <li>Can't Miss Meal: {{ $trip->meal }} </li>
        <li>Must Do Attraction: {{ $trip->attraction }} </li>
        <li>Entry by {{ $trip->traveler }} {{ $trip->created_at->format('m/d/y') }}</li>
    </ul>

    <a href='trips/{{ $trip->id }}/edit'>Edit Entry</a>

</div>