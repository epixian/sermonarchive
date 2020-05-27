<template>
  <div class="hidden sm:ml-6 sm:flex sm:items-center">

    <!-- Profile dropdown -->
    <div class="relative">
      <div>
        <button @click="open = !open" class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition duration-150 ease-in-out" id="user-menu" aria-label="User menu" aria-haspopup="true">
          <img class="h-10 w-10 rounded-full" :src="user.gravatar" alt="" />
        </button>
      </div>

      <transition
        enter-active-class="transition ease-out duration-200"
        enter-class="transform opacity-0 scale-95"
        enter-to-class="transform opacity-100 scale-100"
        leave-active-class="transition ease-in duration-75"
        leave-class="transform opacity-100 scale-100"
        leave-to-class="transform opacity-0 scale-95">
        <div v-show="open" class="origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg">
          <div class="pb-1 rounded-md bg-white shadow-xs">
            <div class="bg-gray-50 border-b border-gray-200">
              <div class="px-4 pt-3 text-sm font-medium leading-5 text-gray-700">{{ user.name }}</div>
              <div class="px-4 pb-2 text-sm leading-5 text-gray-700">{{ user.email }}</div>
              <div v-if="user.breeze_id" class="flex items-center px-4 py-2 bg-nl-blue-100 text-sm text-nl-blue-500">
                <svg class="h-5 w-5 mr-1 stroke-current" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" stroke="currentColor" viewBox="0 0 24 24"><path d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"></path></svg>
                Verified
              </div>
            </div>
            <a href="/logout" @click.prevent="logout" class="block px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out">Sign out</a>

          </div>
        </div>
      </transition>
    </div>
  </div>
</template>

<script>
  export default {
    props: {
      user: {
        type: Object,
        required: true,
      },
    },
    data() {
      return {
        open: false,
      }
    },
    methods: {
      logout() {
        document.getElementById('logout-form').submit();
      }
    }
  }
</script>
