@component('mail::message')
# Hi {{ $title }} {{ $name }},

Your appointment request with the following details is confirmed:

> **Date    :** {{ $app_date }}  
> **Time    :** {{ $app_timeFrom }} - {{ $app_timeTo }}  
> **Purpose :** {{ $desc }}

See you soon.  

Thanks,<br>
KY Appointment System
@endcomponent