@extends('layouts.app')
@section('content')
    <h2>Contacts List</h2>
    <a href="{{ route('contacts.create') }}" class="btn btn-primary">Add Contact</a>
    <form action="{{ route('contacts.import') }}" method="POST" enctype="multipart/form-data" class="mt-3">
        @csrf
        <input type="file" name="xml_file" class="form-control">
        <button type="submit" class="btn btn-success mt-2">Import XML</button>
    </form>
    <table class="table mt-3">
        <tr>
            <th>Name</th>
            <th>Phone</th>
            <th>Actions</th>
        </tr>
        @foreach ($contacts as $contact)
            <tr>
                <td>{{ $contact->name }}</td>
                <td>{{ $contact->phone }}</td>
                <td>
                    <a href="{{ route('contacts.edit', $contact) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('contacts.destroy', $contact) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
@endsection