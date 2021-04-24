<template>
  <div>
    <div v-if="status === 'waiting' && mode === 'live'" :class="{ 'flex flex-col-reverse': control }">
      <p class="px-4 sm:px-0" :class="{ 'mt-4': control }">
        The stream will begin about {{ fromNow }}.  Please prepare your hearts for worship.
      </p>
      <img src="https://cdn.newlifeglenside.com/nlg-logo-white.png" class="w-full shadow-md max-w-3xl" :class="{ 'mt-4': !control }" alt="New Life logo">
    </div>

    <video-js v-if="status === 'streaming' || mode === 'preview' || status === 'recorded'" class="video-js vjs-big-play-centered h-full shadow-md" controls autoplay preload="none" data-setup='{ "liveui": true }'>
      <source v-if="status === 'streaming' || mode === 'preview'" :src="'https://stream.newlifeglenside.com/hls/' + sermon.stream_key + '.m3u8'" type="application/vnd.apple.mpegurl">
      <source v-else :src="recordingPath" type="video/mp4">
      <p class="vjs-no-js">To watch this video, please enable Javascript or use a browser that supports HTML5 video.</p>
    </video-js>

    <div v-if="status === 'processing' && mode !== 'preview'" :class="{ 'flex flex-col-reverse': control }">
      <p class="px-4 sm:px-0" :class="{ 'mt-4': control }">
        The stream has ended and is currently processing.  Please check back in a little bit.
      </p>
      <img src="https://cdn.newlifeglenside.com/nlg-logo-white.png" class="w-full shadow-md max-w-3xl" :class="{ 'mt-4': !control }" alt="New Life logo">
    </div>

    <div v-if="!control" class="mt-4 mx-4 sm:mx-0">
      <h2 class="text-lg font-bold leading-tight text-gray-900">{{ sermon.name }}</h2>
      <div v-if="control" class="text-base text-gray-900">
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
        default: false,
      },

      mode: {
        type: String,
        default: 'live',
      },
    },

    computed: {
      fromNow() {
        return moment(this.sermon.scheduled_for).fromNow();
      },

      recordingPath() {
        return this.sermon.recording_url || 'https://stream.newlifeglenside.com/recordings/' + this.sermon.stream_key + '.mp4'
      },
    },

    data() {
      return {
        status: null,
      };
    },

    beforeMount() {
      if (this.mode !== 'preview')
        this.getStatus();
    },

    methods: {
      getStatus() {
        axios.get('/sermons/' + this.sermon.id + '/status')
          .then(({status}) => {
            this.status = status;

            if (this.status === 'waiting' || this.status === 'processing') {
              setTimeout(this.getStatus, 5000);
            }
          });
      },
    },
  }
</script>
