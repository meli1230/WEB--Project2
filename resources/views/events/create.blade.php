<!--this blade is extending tha base layout file-->
@extends('layouts.master')

<!--includes what is in the yield in layouts-->
@section('content')

<h1>Add Event</h1>
<form action="{{ route('events.store') }}" method="POST">
    @csrf <!--used for security reasons, to counter cross-site request forgery attacks-->
    <label for="name">Name:</label>
    <input type="text" name="name" required><br>

    <label for="event_date">Date:</label>
    <input type="datetime-local" name="event_date" required><br>

    <label for="description">Description:</label>
    <textarea name="description" required></textarea><br>

    <button type="submit">Add Event</button>
</form>

<!--end of import-->
@endsection

