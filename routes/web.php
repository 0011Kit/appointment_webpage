<?php

use Illuminate\Support\Facades\Route; //grab stuff from route

/* Type of static method
    - POST      (Write/ Get info - )
    - GET       (Get info from URL - visible from url)
    - PUT       ()
    - DELETE    ()
    - 
    - 
*/

/* Home Page: 
    - User can review the calendar of the selected staff schedule
    - User can select the booking time from pop up dropdown 
    - User will be redirect to appointment form page 
*/
Route::get('/', function () {
    return view('home');
});

/* Appointment Form Page
    - Page opens pre-filled date/time + form for name/email/phone/message
*/
Route::get('/formpage/{datetime}', function ($datatime) {
    // return view('formpage');
    return $datatime;
});

/* Thank you page
    - Display “Your appointment has been booked! We’ll be in touch.”
    - Redirect back to home in 20 seconds
*/
Route::get('/thankyou', function () {
    return view('thankyou');
});


/* Admin Confirmation Page
    - Admin can view and reject/accept the appointment 
    - email will be sent 
*/
Route::get('/adminconfirm', function () {
    return view('adminconfirm');
});