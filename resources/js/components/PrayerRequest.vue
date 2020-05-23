<template>
  <div>
    <span class="rounded-md shadow-sm">
      <button @click="show = true" type="button" class="inline-flex items-center px-4 py-2 border border-transparent text-sm leading-5 font-medium rounded-md text-white bg-nl-blue-500 hover:bg-nl-blue-400 focus:outline-none focus:border-nl-blue-500 focus:shadow-outline-nl-blue active:bg-nl-blue-600 transition ease-in-out duration-150">
        <svg class="-ml-1 mr-2 h-5 w-5" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" stroke="currentColor" viewBox="0 0 24 24"><path d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z"></path></svg>
        Request Prayer
      </button>
    </span>

    <div :class="show ? 'fixed bottom-0 inset-x-0 px-4 pb-6 sm:inset-0 sm:p-0 sm:flex sm:items-center sm:justify-center z-50' : 'hidden'">

      <transition
        enter-active-class="ease-out duration-300"
        enter-class="opacity-0"
        enter-to-class="opacity-100"
        leave-active-class="ease-in duration-200"
        leave-class="opacity-100"
        leave-to-class="opacity-0"
      >
        <div v-if="show" class="fixed inset-0 transition-opacity">
          <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
        </div>

      </transition>

      <transition
        enter-active-class="ease-out duration-300"
        enter-class="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
        enter-to-class="opacity-100 translate-y-0 sm:scale-100"
        leave-active-class="ease-in duration-200"
        leave-class="opacity-100 translate-y-0 sm:scale-100"
        leave-to-class="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
      >
        <div v-if="show" class="bg-white rounded-lg px-4 pt-5 pb-4 overflow-hidden shadow-xl transform transition-all sm:max-w-lg sm:w-full sm:p-6">
          <div>
            <div class="mt-3 text-center sm:mt-5">
              <h3 class="text-lg leading-6 font-medium text-gray-900">
                Request Prayer
              </h3>
              <div class="mt-2">
                <div class="">
                  <label for="body" class="block text-sm font-medium leading-5 text-gray-700">
                    How can we pray for you?
                  </label>
                  <div class="mt-1 rounded-md shadow-sm">
                    <textarea v-model="body" id="body" rows="3" class="form-textarea block w-full transition duration-150 ease-in-out sm:text-sm sm:leading-5"></textarea>
                  </div>
                  <p class="mt-2 text-sm text-gray-500">This will be sent to the pastor.</p>
                </div>
              </div>
            </div>
          </div>
          <div class="mt-5 sm:mt-6 sm:grid sm:grid-cols-2 sm:gap-3 sm:grid-flow-row-dense">
            <span class="flex w-full rounded-md shadow-sm sm:col-start-2">
              <button type="button" @click="sendPrayerRequest" class="inline-flex justify-center w-full rounded-md border border-transparent px-4 py-2 bg-nl-green-600 text-base leading-6 font-medium text-white shadow-sm hover:bg-nl-green-500 focus:outline-none focus:border-nl-green-700 focus:shadow-outline-nl-green transition ease-in-out duration-150 sm:text-sm sm:leading-5">
                Send
              </button>
            </span>
            <span class="mt-3 flex w-full rounded-md shadow-sm sm:mt-0 sm:col-start-1">
              <button type="button" @click="show = false" class="inline-flex justify-center w-full rounded-md border border-gray-300 px-4 py-2 bg-white text-base leading-6 font-medium text-gray-700 shadow-sm hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline transition ease-in-out duration-150 sm:text-sm sm:leading-5">
                Cancel
              </button>
            </span>
          </div>
        </div>
      </transition>
    </div>
  </div>
</template>

<script>
  export default {
    data() {
      return {
        show: false,
        body: '',
      }
    },
    methods: {
      sendPrayerRequest() {
        this.body = this.body.trim();
        if (this.body !== '') {
          axios.post('/prayer', { 'body': this.body })
            .then(response => response.data)
            .then(data => console.log(data));
        }
      }
    }
  }
</script>
