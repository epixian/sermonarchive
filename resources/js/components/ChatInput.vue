<template>
  <div class="flex rounded-md shadow-sm">
    <div class="flex-grow focus-within:z-10">
      <input v-model="message" @keyup.enter="sendMessage" class="form-input block w-full rounded-none transition ease-in-out duration-150 sm:text-sm sm:leading-5" placeholder="Send a message" />
    </div>
    <button @click="sendMessage" class="-ml-px relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm leading-5 font-medium rounded-none text-gray-700 bg-gray-50 hover:text-gray-500 hover:bg-white focus:outline-none focus:shadow-outline-blue focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150">Send</button>
  </div>
</template>

<script>
  export default {
    props: [
      'user',
      'service',
    ],

    data() {
      return {
        message: '',
      }
    },

    methods: {
      sendMessage() {
        this.$emit('message-sent', {
          user: this.user,
          service: this.service,
          message: this.message,
        });

        this.message = ''
      }
    }
  }
</script>

<style scoped>

</style>
