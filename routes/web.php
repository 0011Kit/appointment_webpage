<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;


/* Home Page: 
    - User can review the calendar of the selected staff schedule
    - User can select the booking time from pop up dropdown 
    - User will be redirect to appointment form page 

    #this is a named route
*/
Route::get('/', function () {
    return view('home');
})->name("homepage");


/* ///////////// ::  Appointment Form Page :: ///////////// 
    - Page opens pre-filled date/time + form for name/email/phone/message

    #this is a parameter with named route
*/
Route::get('/formpage/{datetime}', function ($datetime) {
    //passed value :: formpage/2025-06-26_19-24_20-25

    if($datetime == null){
        return "Invalid inputs. ";
    }else{
      $parts = explode('_', $datetime);

    $date = $parts[0] ?? '';
    $timeFrom = isset($parts[1]) ? str_replace('-', ':', $parts[1]) : '';
    $timeTo   = isset($parts[2]) ? str_replace('-', ':', $parts[2]) : '';

    return view('formpage', [
        'datetime' => $datetime,
        'date' => $date,
        'timeFrom' => $timeFrom,
        'timeTo' => $timeTo,
    ]);  
    }

    
//    return view('formpage', ['datetime' => $datetime]);
})->name('form.datetime');
//////////////////////////////////////////////////////////////////////////////




/* ///////////// :: Submit Form :: /////////////
    - to submit the form 

    # this is a normal post route
 */
Route::post('/formsubmitted', function (Request $request) {

    $request->validate([
        'title' => 'required|min:2|max:2',
        'name' => 'required|min:2|max:30',
        'email' => 'required|email',
    ]);

    $name = $request->input("name");
    $title = $request->input("title");
    $email = $request->input("email");

    return view('formsubmitted', [
        "fullname" => $title.".".$name,
        "email" => $email
    ]);
})->name('formsubmitted');
/////////////////////////////////////////////////




/* //////// ::  Admin Confirmation Page :: ///////////// 
    - Admin can view and reject/accept the appointment 
    - email will be sent afterward
*/
Route::get('/adminconfirm', function () {
    return view('adminconfirm');
});
/////////////////////////////////////////////////////////



/*//////////////////////////////////////////////////   :: NOTE ::   ////////////////////////////////////////////////////////////////////////////
 Type of static method
    - POST      (Write/ Get info - )
    - GET       (Get info from URL - visible from url)
    - PUT       ()
    - DELETE    ()
    - 
    - 


There is another kind of route -- Group Route 
    >> this is for a page that contains a lots of rediect link like menu   
    >> multi route in one page 
    sanmple: 

    Route::prefix("companies")->group(function () {
        Route::get('/company1', function(){
            return view('company1');
        });

        Route::get('/company2', function(){
            return view('company2');
        });

        Route::get('/company3', function(){
            return view('company3');
        });
    
    });
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////*/