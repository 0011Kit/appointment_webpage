@extends('layouts.default')

@section('main_content')
<div class="form-wrapper">
    <h2>Edit Visitor</h2>

    <form action="{{ route('admin.update', $visitor->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="title">Title:</label>
        <input type="text" name="title" value="{{ old('title', $visitor->title) }}" required>

        <label for="name">Name:</label>
        <input type="text" name="name" value="{{ old('name', $visitor->name) }}" required>

        <label for="email">Email:</label>
        <input type="email" name="email" value="{{ old('email', $visitor->email) }}" required>

        <label for="desc">Description:</label>
        <textarea name="desc" required>{{ old('desc', $visitor->desc) }}</textarea>
        
        <label for="record_status">Status:</label>
        <input type="text" name="record_status" value="{{ old('record_status', $visitor->record_status) }}" required>
        <br><br>
        <button type="submit">Update</button>
    </form>
</div>
@endsection