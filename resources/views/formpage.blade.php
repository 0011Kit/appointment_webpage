@extends('layouts.default')

@section('header_title')
<h1 class="site-header">Appointment Form</h1>      
@endsection

@section('main_content')
<h2>Appointment on {{$date}} From {{$timeFrom}} To {{$timeTo}}</h2>

    <div class="content_container">
    <form method="POST" action="{{ url('/formsubmitted') }}">
        @csrf
        <input type="hidden" id="datetime" name="appointment_datetime" value="{{ $datetime }}">

        <label>Your Name:</label>
        <div class="split_container">
            <div>
                <select id="title" name="title">
                    <option value="Mr">Mr</option>
                    <option value="Ms">Ms</option>
                </select>
            </div>
            <div>
                <input type="text"  id="name" name="name" placeholder="Enter Name" required>
            </div>

        </div>
        <!-- <label type="hidden" id="errorLabel1"></label> -->
        <br>
        <label>Your Email:</label>
        <input type="email"  id="email" name="email"  placeholder="Enter Email" required>            
        <!-- <label type="hidden" id="errorLabel1"></label> -->
        <br>
        <label>Your Phone No:</label>
        <input type="tel" id="phone" name="phone" placeholder="Enter Phone">
        <br><br>
        <button type="submit" >Confirm Appointment</button>
    </form>
        
</div>

@endsection