@component('mail::message')
{{ $prayer['body'] }}

Requested by {{ $from->name }} ({{ $from->email }}) on {{ Carbon\Carbon::now(env('TIMEZONE')) }} via live.newlifeglenside.com.
@endcomponent
