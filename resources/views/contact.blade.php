@extends('layouts.default')

@section('header_title')
<h1 class="site-header">CONTACT</h1>      
@endsection

@section('main_content')
<div class="contact-content-wrapper">
    <div class="contact-box" >
        <h2 >Interested in </h2>
        <h1 class="section-title">{{ $topic ?? 'My Projects' }}  ?</h1>
        <h4 >Book an Appointment to know more</h4>
    </div>

    <div >
        <form class="appointment-form" id="appointment-form">            
            <div class="form-columns">
                <div class="form-left">
                    <label for="calendar">Select Date:</label>
                    <div id="inline-calendar"></div>
                    <input type="hidden" id="date" name="appointment_date" required>
                    <br>
                    <p class="selected-date-msg">You picked: <span id="picked-date">none</span></p>
                </div>
                <div class="form-right">
                    <input type="hidden" name="topic" id="topic" value="{{ $topic }}">
                    <label>Select Time:</label>
                    <p class="note">Please note that One(1) time slot is 30 minutes.</p>
                    <label for="timeFrom">From:</label>
                    <select id="timeFrom" class="form-select" required></select>
                    <label for="timeTo">To:</label>
                    <select id="timeTo" class="form-select" required></select>
                    <br>
                    <button id="bookBtn" type="button" class="">Book Appointment</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection

@section('scripts')
<script>
    function to12HourFormat(hour24, minute) {
        const suffix = hour24 >= 12 ? "PM" : "AM";
        const hour12 = hour24 % 12 || 12;
        const paddedMinute = String(minute).padStart(2, '0');
        return `${hour12}:${paddedMinute} ${suffix}`;
    }

    function toValueFormat(hour24, minute) {
        return `${String(hour24).padStart(2, '0')}:${String(minute).padStart(2, '0')}`;
    }

    function generateTimeOptions() {
        const timeFrom = document.getElementById('timeFrom');
        const timeTo = document.getElementById('timeTo');
        timeFrom.innerHTML = '';
        timeTo.innerHTML = '';

        const start = 9 * 60;
        const end = 17 * 60;

        for (let minutes = start; minutes < end; minutes += 30) {
            const hour = Math.floor(minutes / 60);
            const min = minutes % 60;
            const display = to12HourFormat(hour, min);
            const value = toValueFormat(hour, min);
            timeFrom.add(new Option(display, value));
        }

        timeFrom.addEventListener('change', function () {
            const [h, m] = this.value.split(':');
            const fromMinutes = parseInt(h) * 60 + parseInt(m);
            timeTo.innerHTML = '';
            for (let minutes = fromMinutes + 30; minutes <= end; minutes += 30) {
                const hour = Math.floor(minutes / 60);
                const min = minutes % 60;
                const display = to12HourFormat(hour, min);
                const value = toValueFormat(hour, min);
                timeTo.add(new Option(display, value));
            }
        });
    }

    $(document).ready(function () {
        generateTimeOptions();
        $('#inline-calendar').datepicker({
            format: 'yyyy-mm-dd',
            startDate: new Date(),
            todayHighlight: true,
            autoclose: true,
            container: '#inline-calendar',
            inline: true
        }).on('changeDate', function (e) {
            const picked = e.format();
            $('#picked-date').text(picked);
            $('#date').val(picked);
        });

        $('#bookBtn').on('click', function () {
            const date = $('#date').val();
            const timeFrom = $('#timeFrom').val().replace(/:/g, '-');
            const timeTo = $('#timeTo').val().replace(/:/g, '-');
            const topic = document.getElementById('topic').value;


            if (!date || !timeFrom || !timeTo) {
                alert("Please select date and both times.");
                return;
            }

            const datetime = `${date}_${timeFrom}_${timeTo}`;
            const url = `/dashboard/appointment_webpage/public/formpage/${encodeURIComponent(datetime)}/${topic}`;
            window.location.href = url;
        });
    });
</script>
@endsection