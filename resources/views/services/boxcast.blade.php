@extends('layouts.app')

@section('content')
<div class="-mx-4 sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8 lg:flex lg:items-start">
    <div id="boxcast-widget-klms6xngthujoagdnrl8" class="w-full"></div>
    <script type="text/javascript" charset="utf-8">(function(d, s, c, o) {var js = d.createElement(s), fjs = d.getElementsByTagName(s)[0];var h = (('https:' == document.location.protocol) ? 'https:' : 'http:');js.src = h + '//js.boxcast.com/v3.min.js';js.onload = function() { boxcast.noConflict()('#boxcast-widget-'+c).loadChannel(c, o); };js.charset = 'utf-8';fjs.parentNode.insertBefore(js, fjs);}(document, 'script', 'klms6xngthujoagdnrl8', {"showTitle":1,"showDescription":1,"showHighlights":1,"showRelated":true,"defaultVideo":"next","market":"house-of-worship","showDocuments":true,"showIndex":true,"showDonations":false,"showChat":true,"layout":"playlist-to-right"}));</script>
</div>
@endsection
