@extends('layouts.default')

@section('header_title')
<h1 class="site-header">Visitor Management</h1>      
@endsection

@section('main_content')
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif
<div class="admin-container">
    <div class="admin-header">
        <h2 class="admin-title">All Visitor Submissions</h2>
    </div>

    <!-- Enhanced Filter Section -->
        <form method="GET" action="{{ route('admin.index') }}" class="filter-section">
            <div class="filter-form">
                <div class="filter-group">
                    <label for="search" class="filter-label">Name :</label>
                    <input type="text" id="search" name="search" class="filter-input" 
                        placeholder="Enter Name" value="{{ request('search') }}">
                </div>
                <div class="filter-group">
                    <label for="email" class="filter-label">Email:</label>
                    <input type="email" id="email" name="email" class="filter-input" 
                        placeholder="Enter Email" value="{{ request('email') }}">
                </div>
                <div class="filter-group">
                    <label for="date_from" class="filter-label">From Date</label>
                    <input type="date" id="date_from" name="date_from" class="filter-input" 
                        placeholder="dd/mm/yyyy" value="{{ request('date_from') }}">
                </div>
                <div class="filter-group">
                    <label for="date_to" class="filter-label">To Date</label>
                    <input type="date" id="date_to" name="date_to" class="filter-input" 
                        placeholder="dd/mm/yyyy" value="{{ request('date_to') }}">
                </div>
                <div class="filter-actions">
                    <a href="{{ route('admin.index') }}" class="btn btn-outline-secondary">Reset</a>
                    <button type="submit" class="btn btn-primary">Filter</button>
                </div>
            </div>
        </form>

    <!-- Visitors Table -->
    <table class="data-table">
        <thead>
            <tr>
                <th>Actions</th>
                <th>#</th>
                <th>Title</th>
                <th>Name</th>
                <th>Email</th>
                <th>Planned Date</th>
                <th>Planned Time</th>
                <th>Description</th>
                <th>Submitted At</th>
            </tr>
        </thead>
        <tbody>
            @forelse($visitorsArr as $index => $visitor)
                <tr>
                    <td class="action-buttons">
                        <a href="{{ route('admin.edit', $visitor->id) }}" >
                            <img src="https://cdn-icons-png.flaticon.com/512/1159/1159633.png" alt="Edit" width="16">
                        </a>
                        <form method="POST" action="{{ route('admin.destroy', $visitor->id) }}" onsubmit="return confirm('Are you sure to delete the record from {{ $visitor->name }} (Email :  {{ $visitor->email }} )?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit"  >
                                <img src="https://cdn-icons-png.flaticon.com/512/1214/1214428.png" alt="Delete" width="16">
                            </button>                            
                        </form>
                        <form method="POST" action="{{ route('admin.sendEmail', $visitor->id) }}" onsubmit="return confirm('Send email to {{ $visitor->email }}?')" style="display: inline;">
                            @csrf
                            <button type="submit" style="background:none; border:none; padding:0;">
                                <img src="https://cdn-icons-png.flaticon.com/512/725/725643.png" alt="Send Email" width="16">
                            </button>
                        </form>
                    </td>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $visitor->title }}</td>
                    <td>{{ $visitor->name }}</td>
                    <td>{{ $visitor->email }}</td>
                    <td>{{ $visitor->app_date }}</td>
                    <td>{{ $visitor->app_timeFrom }} - {{ $visitor->app_timeTo }}</td>
                    <td>{{ Str::limit($visitor->desc, 50) }}</td>
                    <td>{{ $visitor->created_at->format('Y-m-d H:i') }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="empty-state">No visitor submissions found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
