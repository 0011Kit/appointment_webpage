@extends('layouts.default')

@section('header_title')
    <h1 class="site-header">Form Submitted</h1>
@endsection

@section('main_content')
<div class="content_container">
    <div class="thankyou-text">
        <p class="hello-text">Hey, <strong>{{ $fullname }}</strong></p>
        <h1 class="thank-you">Thank you!</h1>
        <h3>Your appointment has been submitted.</h3>
        <p class="email-note">
            The confirmation email will be sent to (Email Address: <strong>{{ $email }}</strong>) 
            soon once your appointment is approved.
        </p>
        <a href="{{ route('homepage') }}" class="back-link">Go back to homepage</a>
    </div>
    
    <div class="thankyou-image">
        <div class="image-placeholder">
            <span>Picture</span>
        </div>
    </div>
</div>
@endsection