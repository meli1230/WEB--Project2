@extends('layouts.master')
@section('content')

<!-- Search Form -->
<form action="{{ route('members.index') }}" method="GET" style="margin-bottom: 20px;">
    <input type="text" name="search" placeholder="Search by name or email"
           value="{{ request('search') }}" style="padding: 5px;">
    <button type="submit">Search</button>
    @if(request('search'))
        <a href="{{ route('members.index') }}" style="margin-left: 10px;">Clear Search</a>
    @endif
</form>

<table>
    <thead>
    <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Profession</th>
        <th>Company</th>
        <th>LinkedIn</th>
        <th>Status</th>
        <th>Actions</th>
    </tr>
    </thead>
    <tbody>
    @foreach ($members as $member)
        <tr>
            <td>{{ $member->name }}</td>
            <td>{{ $member->email }}</td>
            <td>{{ $member->profession }}</td>
            <td>{{ $member->company }}</td>
            <td>{{ $member->linkedin_url}}</td>
            <td>{{ $member->status }}</td>
            <td>
                <a href="{{ route('members.edit', $member->id) }}">Edit</a>
                <form action="{{ route('members.destroy', $member->id) }}"
                      method="POST"
                      style="display: inline-block;"
                      onsubmit="return confirm('Are you sure you want to delete this member?');">
                    @csrf
                    @method('DELETE')
                    <button type="saubmit">Delete</button>
                </form>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>



{{ $members->links() }}

@endsection
