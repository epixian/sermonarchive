<template>
  <div>
    <div v-if="statusText === 'waiting' && mode === 'live'" :class="{ 'flex flex-col-reverse': control }">
      <p class="px-4 sm:px-0" :class="{ 'mt-4': control }">
        The stream will begin about {{ fromNow }}.  Please prepare your hearts for worship.
      </p>
      <img src="https://cdn.newlifeglenside.com/nlg-logo-white.png" class="w-full shadow-md max-w-3xl" :class="{ 'mt-4': !control }" alt="New Life logo">
    </div>

    <video-js v-if="statusText === 'streaming' || mode === 'preview' || statusText === 'recorded'" class="video-js vjs-big-play-centered h-full shadow-md" controls autoplay preload="none" data-setup='{ "liveui": true }'>
      <source v-if="statusText === 'streaming' || mode === 'preview'" :src="'https://stream.newlifeglenside.com/hls/' + sermon.stream_key + '.m3u8'" type="application/vnd.apple.mpegurl">
      <source v-else :src="'https://stream.newlifeglenside.com/recordings/' + sermon.stream_key + '.mp4'" type="video/mp4">
      <p class="vjs-no-js">To watch this video, please enable Javascript or use a browser that supports HTML5 video.</p>
    </video-js>

    <div v-if="statusText === 'processing'" class="">
      <p class="px-4 sm:px-0">
        The stream has ended.  Please check back later when the video is done processing.
      </p>
      <img src="https://cdn.newlifeglenside.com/nlg-logo-white.png" class="mt-4 w-full shadow-md max-w-3xl" alt="New Life logo">
    </div>

    <div v-if="!control" class="mt-4 mx-4 sm:mx-0">
      <h2 class="text-lg font-bold leading-tight text-gray-900">{{ sermon.name }}</h2>
      <div v-if="description" class="text-base text-gray-900">
        {{ sermon.description }}
      </div>
    </div>
  </div>
</template>

<script>
  import moment from 'moment';

  export default {
    props: {
      sermon: {
        type: Object,
        required: true,
      },
      control: {
        type: Boolean,
        required: false,
        default: false,
      },
      mode: {
        type: String,
        required: false,
        default: 'live',
      },
    },
    data() {
      return {
        'stream_started': this.sermon.stream_started,
        'stream_ended': this.sermon.stream_ended,
        'recording_done': this.sermon.recording_done,
      }
    },
    computed: {
      fromNow() {
        return moment(this.sermon.scheduled_for).fromNow();
      },
      statusText() {
        if (this.recording_done !== 0)
          return 'recorded';
        else if (this.stream_ended !== 0 && this.recording_done === 0)
          return 'processing';
        else if (this.stream_started !== 0 && this.stream_ended === 0)
          return 'streaming';
        else
          return 'waiting';
      }
    },
    methods: {
      getStatus() {
        fetch('/sermons/' + this.sermon.id + '/status')
          .then(response => response.json())
          .then(data => {
            this.stream_started = data.stream_started;
            this.stream_ended = data.stream_ended;
            this.recording_done = data.recording_done;

            if (this.statusText === 'waiting' || this.statusText === 'processing') {
              setTimeout(this.getStatus, 10000);
            }
          });
      },
    },
    created() {
      if (this.mode !== 'preview')
        this.getStatus();
    }
  }
</script>
