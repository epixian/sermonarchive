<template>
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="relative mt-4">
      <transition
        enter-active-class="transition ease-in duration-100"
        enter-class="opacity-0"
        enter-to-class="opacity-100"
        leave-active-class="transition ease-out duration-75"
        leave-class="opacity-100"
        leave-to-class="opacity-0"
        mode="out-in"
        >
        <div v-show="available.length && showAttendancePad">
          <div class="mx-4 sm:mx-6 text-base text-center leading-6 font-medium">
            Who is checking in?
          </div>
          <div class="flex flex-wrap items-center justify-center mx-4 sm:mx-6 space-x-2">
            <span v-for="person in available" :key="person.id" class="inline-flex rounded-md shadow-sm">
              <button @click="select(person)" type="button" class="mt-2 inline-flex items-center px-4 py-2 border text-sm leading-5 font-medium rounded-md transition ease-in-out duration-150" :class="!selected.includes(person) ? 'border-gray-300 text-gray-700 bg-white hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue active:text-gray-800 active:bg-gray-50' : 'border-nl-green-300 text-nl-green-700 bg-nl-green-100 hover:bg-nl-green-50 focus:outline-none focus:border-nl-green-300 focus:shadow-outline-nl-green active:bg-nl-green-200'">
                {{ person.name }}
              </button>
            </span>
          </div>
        </div>
      </transition>
      <div v-if="showButtons" class="absolute top-0 right-0 flex rounded-md shadow-sm">
        <transition mode="out-in">
          <div v-if="available.length">
            <button v-if="showAttendancePad" @click="showAttendancePad = false" type="button" class="inline-flex items-center px-4 py-2 border text-sm leading-5 font-medium rounded-md transition ease-in-out duration-150 border-gray-300 text-gray-700 bg-white hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue active:text-gray-800 active:bg-gray-50">
              Close
            </button>
            <button v-else @click="showAttendancePad = true" type="button" class="inline-flex items-center px-4 py-2 border border-transparent text-sm leading-5 font-medium rounded-md text-white bg-nl-blue-600 hover:bg-nl-blue-500 focus:outline-none focus:border-nl-blue-700 focus:shadow-outline-nl-blue active:bg-nl-blue-700 transition ease-in-out duration-150">
              Check In
            </button>
          </div>
        </transition>
      </div>
    </div>
  </div>
</template>

<script>
  export default {
    data() {
      return {
        available: [],
        selected: [],
        showAttendancePad: false,
        message: '',
        showButtons: false,
      }
    },
    created() {
      fetch('/user/family')
        .then(response => response.json())
        .then(data => {
          this.available = data;
          this.showButtons = true;
        });
    },
    methods: {
      clickCheckInButton() {
        if (this.available.length)
          this.showAttendancePad = true;
        else
          this.message = 'Already checked in!';
      },
      checkIn(ids) {
        axios.post('/check-in', ids)
          .then(console.log);
      },
      select(person) {
        this.selected.push(person);
        axios.post('/check-in', person)
          .then(() => {
            this.available = this.available.filter(item => item !== person);
          });
      }
    }
  }
</script>
