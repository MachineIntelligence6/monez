@component('mail::message')
A new message received from {{ $data->name }} ({{$data->email}})

Subject: {{ $data->subject }}

{{ $data->message}}

Thank you<br>
{{ config('app.name') }}
@endcomponent
