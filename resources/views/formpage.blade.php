@extends('layouts.default')

@section('header_title')
<h1 class="site-header">Appointment Form</h1>      
@endsection

@section('main_content')
<div class="contact-content-wrapper">
    <div class="contact-box" >
        <h2 class="section-title">Appointment planned on </h2>
        <br>
        <h5>Topic : <span> {{$topic}} </span></h5>
        <br>
        <h5>DATE : <span> {{$date}} </span></h5>
        <br>
        <h5>Time : <span> {{$timeFrom}}  to {{$timeTo}}</span></h5>
    </div>

    <form method="POST" action="{{ route('formsubmitted') }}">
        @csrf
        <input type="hidden" id="app_date" name="app_date" value="{{ $date }}">
        <input type="hidden" id="app_timefrom" name="app_timefrom" value="{{ $timeFrom }}">
        <input type="hidden" id="app_timeTo" name="app_timeTo" value="{{ $timeTo }}">
        <input type="hidden" id="topic" name="topic" value="{{ $topic }}">

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
        <br>
        <label>Description:</label>
        <input type="text" id="desc" name="desc" placeholder="Enter the purpose of the appointment" required>
        <br><br>
        <button type="submit" >Confirm Appointment</button>
    </form>
</div>

@endsection