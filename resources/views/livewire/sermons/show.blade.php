<div>
    {{ $sermon }}

    <div class="w-full pb-2/3 relative">
        <video-js id="my-video" class="video-js">

        </video-js>
    </div>

    <link href="https://vjs.zencdn.net/7.7.6/video-js.css" rel="stylesheet" />
    <script src="https://vjs.zencdn.net/7.7.6/video.js"></script>
    <script>
        var player = new videojs('my-video', {
            liveui: true,
            controls: true,
            autoplay: true,
            preload: 'none',
        });
        player.src({
            src: 'https://stream.newlifeglenside.com/hls/{{ $sermon->stream_key }}.m3u8',
            type: 'application/vnd.apple.mpegurl',
        });
    </script>
</div>
