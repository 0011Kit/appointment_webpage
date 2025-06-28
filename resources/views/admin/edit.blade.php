@extends('layouts.default')

@section('main_content')
<div class="form-wrapper">
    <h2>Edit Visitor</h2>

    <form action="{{ route('admin.update', $admin->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="title">Title:</label>
        <input type="text" name="title" value="{{ old('title', $admin->title) }}" required>

        <label for="name">Name:</label>
        <input type="text" name="name" value="{{ old('name', $admin->name) }}" required>

        <label for="email">Email:</label>
        <input type="email" name="email" value="{{ old('email', $admin->email) }}" required>

        <label for="desc">Description:</label>
        <textarea name="desc" required>{{ old('desc', $admin->desc) }}</textarea>

        <button type="submit">Update</button>
    </form>
</div>
@endsection