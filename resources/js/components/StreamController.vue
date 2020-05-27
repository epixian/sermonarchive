<template>
  <div class="text-right">
    <span v-if="!stream_started" class="inline-flex rounded-md shadow-sm">
      <button @click="startStream" type="button" class="inline-flex items-center px-4 py-2 border border-transparent text-sm leading-5 font-medium rounded-md text-white bg-nl-blue-600 hover:bg-nl-blue-500 focus:outline-none focus:border-nl-blue-700 focus:shadow-outline-nl-blue active:bg-nl-blue-700 transition ease-in-out duration-150">
        Go Live
      </button>
    </span>
    <span v-if="stream_started && !stream_ended" class="inline-flex rounded-md shadow-sm">
      <button @click="endStream" type="button" class="inline-flex items-center px-4 py-2 border border-transparent text-sm leading-5 font-medium rounded-md text-white bg-nl-blue-600 hover:bg-nl-blue-500 focus:outline-none focus:border-nl-blue-700 focus:shadow-outline-nl-blue active:bg-nl-blue-700 transition ease-in-out duration-150">
        End Stream
      </button>
    </span>
    <span v-if="stream_ended && !recording_done" class="inline-flex rounded-md shadow-sm">
      <button @click="doneRecording" type="button" class="inline-flex items-center px-4 py-2 border border-transparent text-sm leading-5 font-medium rounded-md text-white bg-nl-blue-600 hover:bg-nl-blue-500 focus:outline-none focus:border-nl-blue-700 focus:shadow-outline-nl-blue active:bg-nl-blue-700 transition ease-in-out duration-150">
        ffmpeg Done (manual)
      </button>
    </span>
  </div>
</template>

<script>
  export default {
    props: {
      sermon: {
        type: Object,
        required: true,
      }
    },
    data() {
      return {
        stream_started: false,
        stream_ended: false,
      }
    },
    methods: {
      doneRecording() {
        axios.post('/admin/sermons/' + this.sermon.id + '/status', {
          recording_done: true,
        })
          .then(response => response.data)
          .then(data => {
            this.recording_done = data.recording_done;
          })
      },
      startStream() {
        axios.post('/admin/sermons/' + this.sermon.id + '/status', {
          stream_started: true,
        })
          .then(response => response.data)
          .then(data => {
            this.stream_started = data.stream_started;
          })
      },
      endStream() {
        axios.post('/admin/sermons/' + this.sermon.id + '/status', {
          stream_ended: true,
        })
          .then(response => response.data)
          .then(data => {
            this.stream_ended = data.stream_ended;
          })
      },
    },
    created() {
      axios.get('/sermons/' + this.sermon.id + '/status')
        .then(response => response.data)
        .then(data => {
          this.stream_started = data.stream_started;
          this.stream_ended = data.stream_ended;
          this.recording_done = data.recording_done;
        });
    }
  }
</script>
