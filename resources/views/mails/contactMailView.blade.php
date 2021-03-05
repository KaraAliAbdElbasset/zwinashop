@component('mail::message')
# Name : {{$data['name']}}
# Email : {{$data['email']}}
# Subject : {{$data['subject']}}

{{$data['message']}}

Thanks,<br>
{{ config('app.name') }}
@endcomponent
