@component('mail::message')
# Email : {{$data['email']}}

{{$data['message']}}

Thanks,<br>
{{ config('app.name') }}
@endcomponent
