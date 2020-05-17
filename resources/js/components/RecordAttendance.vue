<template>
  <transition
    enter-active-class="transition ease-in duration-100"
    enter-class="opacity-0"
    enter-to-class="opacity-100"
    leave-active-class="transition ease-out duration-75"
    leave-class="opacity-100"
    leave-to-class="opacity-0"
    mode="out-in"
    >
    <div v-show="available.length" class="max-w-7xl mx-auto">
      <div class="mt-4 mx-4 sm:mx-6 text-base text-center leading-6 font-medium">
        Who is worshiping together with you today?
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
</template>

<script>
  export default {
    data() {
      return {
        available: [],
        selected: [],
      }
    },
    created() {
      axios.get('/user/family')
        .then(response => {
          if (response.data.length === 1)
            this.checkIn(response.data);
          else
            this.available = response.data;
        });
    },
    methods: {
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
