@extends('layouts.default')

@section('header_title')
    <h1 class="site-header">Form Submitted</h1>
@endsection

@section('main_content')
<div class="content_container">
    <div class="thankyou-text">
        <p class="hello-text">Hey, <strong>{{ $fullname }}</strong></p>
        <h1 class="thank-you">Thank you!</h1>
        <h3>Thank you for reaching out. Your request has been submitted.</h3>
        <p class="email-note">
            An email will be sent to (Email Address: <strong>{{ $email }}</strong>) 
            soon once has been confirmed.            
        </p>
        <a href="{{ route('home') }}" class="back-link">Go back to homepage</a>
    </div>
    
    <div class="thankyou-image">
        <div class="image-placeholder">
            <img  class="round-image" src="{{ asset('/images/hand_shake.jpg') }}" alt="shake hand"/>
        </div>
    </div>
</div>
@endsection