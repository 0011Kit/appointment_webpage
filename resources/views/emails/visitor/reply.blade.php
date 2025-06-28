@component('mail::message')
# Hi {{ $title }} {{ $name }},

Your appointment request with the following details has been approved:

> **Date    :** {{ $app_date }}  
> **Time    :** {{ $app_timefrom }} - {{ $app_timeTo }}  
> **Purpose :** {{ $desc }}

See you soon.  

Thanks,<br>
Kit Yi
@endcomponent