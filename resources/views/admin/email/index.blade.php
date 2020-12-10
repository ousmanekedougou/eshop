@component('mail::message')
# Slut 
- {{$nom}}
 - {{$email}}
@component('mail::panel')
    {{ $sms }}
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
