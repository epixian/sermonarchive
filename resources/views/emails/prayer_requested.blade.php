<div style="font-family: Helvetica, Arial, serif;">
<p>{{ $body }}</p>

<small>Requested by {{ $sender['name'] }} ({{ $sender['email'] }}) on {{ Carbon\Carbon::now(env('TIMEZONE')) }} via live.newlifeglenside.com.</small>
</div>
