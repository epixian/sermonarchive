<style>
    @import url(http://fonts.googleapis.com/css?family=Pacifico);
    /* Type styles for all clients */
    * {
     font-family: Helvetica, Arial, serif;
    }
    /* Type styles for WebKit clients */
    @media screen and (-webkit-min-device-pixel-ratio:0) {
      * {
        font-family: Pacifico, Helvetica, Arial, serif !important;
      }
    }
</style>

<p>{{ $body }}</p>

<small>Requested by {{ $sender['name'] }} ({{ $sender['email'] }}) on {{ Carbon\Carbon::now(env('TIMEZONE')) }} via live.newlifeglenside.com.</small>
