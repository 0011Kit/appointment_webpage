<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\VisitorController;

/* //////// ::  Visitor  :: ///////////// 
*/
// 1. Home Page: 
Route::get('/', function () {
    return view('home');
})->name("home");


// 2. Contact Page: 
Route::get('/contact/{topic}', function ($topic) {
   
    if($topic == null){
        return view('contact',[
        'topic' => "My Projects"
    ]);
    }else{     
        return view('contact',[
            'topic' => $topic
        ]);
    }
})->name('contact.topic');


// 3. Appointment Form Page 
Route::get('/formpage/{datetime}/{topic}', function ($datetime, $topic) {
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
        'topic' => $topic
    ]);  
    }

    
//    return view('formpage', ['datetime' => $datetime]);
})->name('form.datetime');

// 4 Appointment Form Submit Form 
Route::post('/formsubmitted', [VisitorController::class, 'store'])->name('formsubmitted');


//////// ::  Admin Page :: ///////////// 
// 1. Admin Index Page
Route::resource('admin', VisitorController::class);
// 2. Admin Send Email Router
Route::post('/admin/{visitor}/send-email', [VisitorController::class, 'sendEmail'])->name('admin.sendEmail');



