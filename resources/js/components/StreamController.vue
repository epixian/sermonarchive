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
      },
    },

    data() {
      return {
        status: null,
      }
    },

    beforeMount() {
      axios.get('/api/sermons/' + this.sermon.id + '/status')
        .then(response => response.data)
        .then(this.saveStatus);
    },

    methods: {
      updateStatus(data) {
        axios.post('/api/sermons/' + this.sermon.id + '/status', data)
          .then(response => response.data)
          .then(({status}) => {
            this.status = status;
          });
      },

      doneRecording() {
        this.updateStatus({ recording_done: true });
      },

      startStream() {
        this.updateStatus({ stream_started: true });
      },

      endStream() {
        this.updateStatus({ stream_ended: true });
      },
    },
  }
</script>
