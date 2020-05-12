<div class="-mx-4 sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8">
    <div class="w-full pb-2/3 relative">
        <video-js id="my-video" class="video-js" controls autoplay preload="none" data-setup='{ "liveui": true }'>
            <source src="https://stream.newlifeglenside.com/hls/{{ $sermon->stream_key }}.m3u8" type="application/vnd.apple.mpegurl">
            <p class="vjs-no-js">To watch this video, please enable Javascript or use a browser that supports HTML5 video.</p>
        </video-js>
    </div>

    <link href="https://vjs.zencdn.net/7.7.6/video-js.css" rel="stylesheet" />
    <script src="https://vjs.zencdn.net/7.7.6/video.js"></script>
</div>
