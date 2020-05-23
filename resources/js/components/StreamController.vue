<template>
  <div class="text-right">
    <span class="inline-flex rounded-md shadow-sm">
      <button @click="goLive" type="button" class="inline-flex items-center px-4 py-2 border border-transparent text-sm leading-5 font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-700 transition ease-in-out duration-150" :disabled="stream_started">
        Go Live
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
      }
    },
    methods: {
      goLive() {
        axios.post('/admin/sermons/' + this.sermon.id + '/status', {
          stream_started: true,
        })
          .then(response => response.json())
          .then(data => {
            this.stream_started = data.stream_started;
          })
      }
    }
  }
</script>
