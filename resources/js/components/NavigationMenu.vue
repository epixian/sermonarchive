<template>
	<nav x-cloak x-data="{ menuOpen: false }" class="bg-white shadow-sm">
		<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
			<div class="flex justify-between h-16">
				<div class="flex">
					<div class="flex-shrink-0 flex items-center">
						<a href="/">
							<img class="hidden md:block lg:hidden h-12 w-auto" src="https://cdn.newlifeglenside.com/leaf.png" alt="New Life logo" />
							<img class="block md:hidden lg:block h-12 w-auto" src="https://cdn.newlifeglenside.com/nlg-logo.png" alt="New Life logo" />
						</a>
					</div>
					<div class="hidden md:ml-8 md:flex md:space-x-6">
						<a href="/" class="inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium leading-5 transition duration-150 ease-in-out" :class="isRoute('/') ? 'text-gray-900 border-nl-blue-500 focus:outline-none focus:border-nl-blue-700' : 'text-gray-500 border-transparent hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300'">
							Live
						</a>

						<a v-if="canEditServices" href="/admin/services" class="inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium leading-5 transition duration-150 ease-in-out" :class="isRoute('admin/services') ? 'text-gray-900 border-nl-blue-500 focus:outline-none focus:border-nl-blue-700' : 'text-gray-500 border-transparent hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300'">
							Services
						</a>

						<a v-if="canEditServices" href="/sermons" class="inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium leading-5 transition duration-150 ease-in-out" :class="isRoute('sermons') ? 'text-gray-900 border-nl-blue-500 focus:outline-none focus:border-nl-blue-700' : 'text-gray-500 border-transparent hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300'">
							Sermons
						</a>

						<a v-if="canEditServices" href="/admin/users" class="inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium leading-5 transition duration-150 ease-in-out" :class="isRoute('admin/users') ? 'text-gray-900 border-nl-blue-500 focus:outline-none focus:border-nl-blue-700' : 'text-gray-500 border-transparent hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300'">
							Users
						</a>

					</div>
				</div>

				<div class="flex items-center space-x-6 md:ml-6">
					<div class="hidden md:block">
					  <span class="rounded-md shadow-sm">
							<a href="https://www.eservicepayments.com/cgi-bin/Vanco_ver3.vps?appver3=Dc8dzPGn4-LCajFevTkh9IrAPiKyxuq1wz14eIF-xa7wDLnFUBRZuK9-TeNGQgRt3ZjrEf-JY61LsyvVDvllero7zqy-JU_UuLu19bUbJx16ST79ddXa13WVGWu3v78lk0PpduXvnt8gXUeZjQYbn8YMd3VAg-5ef_sTFvOQq-g=&ver=3" target="_blank" class="inline-flex items-center px-4 py-2 border border-transparent text-sm leading-5 font-medium rounded-md text-white bg-nl-green-500 hover:bg-nl-green-400 focus:outline-none focus:border-nl-green-500 focus:shadow-outline-nl-green active:bg-nl-green-600 transition ease-in-out duration-150">
								<svg class="-ml-1 mr-2 h-5 w-5" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" stroke="currentColor" viewBox="0 0 24 24"><path d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
								Give
							</a>
						</span>
					</div>

          <PrayerRequest v-if="user" class="hidden md:block"></PrayerRequest>

					<ProfileDropdown v-if="user" :user="user" class="hidden md:block"></ProfileDropdown>

					<div v-else class="h-full hidden md:ml-6 md:flex space-x-6">
						<a href="/login" class="inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium leading-5 transition duration-150 ease-in-out text-gray-500 border-transparent hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300">
							Login
						</a>
						<a href="/register" class="inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium leading-5 transition duration-150 ease-in-out text-gray-500 border-transparent hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300">
							Register
						</a>
					</div>
				</div>

				<div class="-mr-2 flex items-center md:hidden">
					<!-- Mobile menu button -->
					<button @click="mobileNavOpen = !mobileNavOpen" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
						<svg class="h-6 w-6" :class="mobileNavOpen ? 'hidden' : 'block'" stroke="currentColor" fill="none" viewBox="0 0 24 24">
							<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
						</svg>
						<svg class="h-6 w-6" :class="mobileNavOpen ? 'block' : 'hidden'" stroke="currentColor" fill="none" viewBox="0 0 24 24">
							<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
						</svg>
					</button>
				</div>
			</div>
		</div>

		<!-- Mobile menu -->
	  <div v-show="mobileNavOpen" class="block md:hidden">
	    <div class="pb-3 space-y-1">
        <div class="flex items-center w-full space-x-4 px-4 sm:px-6 py-3">
          <div class="rounded-md shadow-sm">
            <a href="https://www.eservicepayments.com/cgi-bin/Vanco_ver3.vps?appver3=Dc8dzPGn4-LCajFevTkh9IrAPiKyxuq1wz14eIF-xa7wDLnFUBRZuK9-TeNGQgRt3ZjrEf-JY61LsyvVDvllero7zqy-JU_UuLu19bUbJx16ST79ddXa13WVGWu3v78lk0PpduXvnt8gXUeZjQYbn8YMd3VAg-5ef_sTFvOQq-g=&ver=3" target="_blank" class="flex items-center px-4 py-2 border border-transparent text-sm leading-5 font-medium rounded-md text-white bg-nl-green-500 hover:bg-nl-green-400 focus:outline-none focus:border-nl-green-500 focus:shadow-outline-nl-green active:bg-nl-green-600 transition ease-in-out duration-150">
              <svg class="-ml-1 mr-2 h-5 w-5" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" stroke="currentColor" viewBox="0 0 24 24"><path d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
              Give
            </a>
          </div>

          <PrayerRequest v-if="user"></PrayerRequest>

        </div>

	      <a href="/" class="block pl-3 sm:pl-5 pr-4 py-2 border-l-4 text-base font-medium transition duration-150 ease-in-out" :class="isRoute('/') ? 'border-nl-blue-500 text-nl-blue-700 bg-nl-blue-50 focus:outline-none focus:text-nl-blue-800 focus:bg-nl-blue-100 focus:border-nl-blue-700' : 'border-transparent text-gray-600 hover:text-gray-800 hover:bg-gray-50 hover:border-gray-300 focus:outline-none focus:text-gray-800 focus:bg-gray-50 focus:border-gray-300'">Live</a>

	      <a v-if="canEditServices" href="/admin/services" class="block pl-3 sm:pl-5 pr-4 py-2 border-l-4 text-base font-medium transition duration-150 ease-in-out" :class="isRoute('admin/services') ? 'border-nl-blue-500 text-nl-blue-700 bg-nl-blue-50 focus:outline-none focus:text-nl-blue-800 focus:bg-nl-blue-100 focus:border-nl-blue-700' : 'border-transparent text-gray-600 hover:text-gray-800 hover:bg-gray-50 hover:border-gray-300 focus:outline-none focus:text-gray-800 focus:bg-gray-50 focus:border-gray-300'">Services</a>

	      <a v-if="canEditSermons" href="/sermons" class="block pl-3 sm:pl-5 pr-4 py-2 border-l-4 text-base font-medium transition duration-150 ease-in-out" :class="isRoute('sermons') ? 'border-nl-blue-500 text-nl-blue-700 bg-nl-blue-50 focus:outline-none focus:text-nl-blue-800 focus:bg-nl-blue-100 focus:border-nl-blue-700' : 'border-transparent text-gray-600 hover:text-gray-800 hover:bg-gray-50 hover:border-gray-300 focus:outline-none focus:text-gray-800 focus:bg-gray-50 focus:border-gray-300'">Sermons</a>

	      <a v-if="canEditServices" href="/admin/users" class="block pl-3 sm:pl-5 pr-4 py-2 border-l-4 text-base font-medium transition duration-150 ease-in-out" :class="isRoute('admin/users') ? 'border-nl-blue-500 text-nl-blue-700 bg-nl-blue-50 focus:outline-none focus:text-nl-blue-800 focus:bg-nl-blue-100 focus:border-nl-blue-700' : 'border-transparent text-gray-600 hover:text-gray-800 hover:bg-gray-50 hover:border-gray-300 focus:outline-none focus:text-gray-800 focus:bg-gray-50 focus:border-gray-300'">Users</a>

	    </div>
	    <div class="border-t border-gray-200">
	      <div v-if="user" class="divide-gray-200 divide-y">
	        <div class="flex items-center px-4 sm:px-6 py-3">
	          <div class="flex-shrink-0">
	            <img class="h-10 w-10 rounded-full" :src="user.gravatar" alt="" />
	          </div>
	          <div class="ml-3">
	            <div class="text-base font-medium leading-6 text-gray-800">
	              {{ user.name }}
	            </div>
	            <div class="inline-flex text-sm font-medium leading-5 text-gray-500">
	              {{ user.email }}
	              <span v-if="user.breeze_id" class="ml-2 inline-flex items-center text-nl-blue-500">
	                <svg class="h-6 w-6 stroke-current" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" stroke="currentColor" viewBox="0 0 24 24"><path d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"></path></svg>
	                Linked
	              </span>
                <span v-else-if="!user.email_verified_at" class="ml-2 inline-flex items-center text-red-600">
                  Unverified
                </span>
                <span v-else-if="!user.breeze_id " class="ml-2 inline-flex items-center text-red-600">
                  Not linked
                </span>
	            </div>
	          </div>
	        </div>
          <div v-if="!user.email_verified_at" class="text-base font-medium leading-6 text-gray-800">
            <a href="/email/resend" @click.prevent="resend" class="block px-4 sm:px-6 py-2 text-base font-medium text-gray-500 hover:text-gray-800 hover:bg-gray-100 focus:outline-none focus:text-gray-800 focus:bg-gray-100 transition duration-150 ease-in-out">Resend verification email</a>
          </div>
          <div v-else-if="!user.breeze_id" class="text-base font-medium leading-6 text-gray-800">
            <a href="/user/link" class="block px-4 sm:px-6 py-2 text-base font-medium text-gray-500 hover:text-gray-800 hover:bg-gray-100 focus:outline-none focus:text-gray-800 focus:bg-gray-100 transition duration-150 ease-in-out">Reattempt link</a>
          </div>
	        <div class="py-3 space-y-1" role="menu" aria-orientation="vertical" aria-labelledby="user-menu">
	          <!-- <a href="#" class="block px-4 py-2 text-base font-medium text-gray-500 hover:text-gray-800 hover:bg-gray-100 focus:outline-none focus:text-gray-800 focus:bg-gray-100 transition duration-150 ease-in-out" role="menuitem">Your Profile</a> -->
	          <!-- <a href="#" class="block px-4 py-2 text-base font-medium text-gray-500 hover:text-gray-800 hover:bg-gray-100 focus:outline-none focus:text-gray-800 focus:bg-gray-100 transition duration-150 ease-in-out" role="menuitem">Settings</a> -->
	          <a href="#" @click="logout" class="block px-4 sm:px-6 py-2 text-base font-medium text-gray-500 hover:text-gray-800 hover:bg-gray-100 focus:outline-none focus:text-gray-800 focus:bg-gray-100 transition duration-150 ease-in-out" role="menuitem">Sign Out</a>
	        </div>
	      </div>

        <div v-else class="py-3 space-y-1" role="menu" aria-orientation="vertical" aria-labelledby="user-menu">
          <a href="/login" class="block px-4 sm:px-6 py-2 text-base font-medium text-gray-500 hover:text-gray-800 hover:bg-gray-100 focus:outline-none focus:text-gray-800 focus:bg-gray-100 transition duration-150 ease-in-out" role="menuitem">Sign In</a>
          <a href="/register" class="block px-4 sm:px-6 py-2 text-base font-medium text-gray-500 hover:text-gray-800 hover:bg-gray-100 focus:outline-none focus:text-gray-800 focus:bg-gray-100 transition duration-150 ease-in-out" role="menuitem">Register</a>
        </div>
	    </div>
	  </div>
    <form id="logout-form" action="/logout" method="POST" class="hidden">
      <input type="hidden" name="_token" :value="csrf">
    </form>
    <form id="resend-verification-email-form" action="/email/resend" method="POST" class="hidden">
      <input type="hidden" name="_token" :value="csrf">
    </form>
	</nav>

</template>

<script>
import ProfileDropdown from './ProfileDropdown';
import PrayerRequest from './PrayerRequest';

export default {
  components: {
  	ProfileDropdown,
    PrayerRequest,
  },
  props: {
  	user: {
  		type: Object,
  		required: false,
  		default: () => {},
  	},
  	route: {
  		type: String,
  		required: false,
  		default: '',
  	},
  },
	data() {
	  return {
			csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
			mobileNavOpen: false,
			profileDropdownOpen: false,
	  }
  },
  computed: {
  	canEditSermons() {
  		return this.user ? this.user.can.includes('edit_sermons') : false;
  	},
  	canEditServices() {
  		return this.user ? this.user.can.includes('edit_services') : false;
  	},
  },
  methods: {
  	isRoute(route) {
  		return route === this.route;
  	},
  	logout() {
			document.getElementById('logout-form').submit();
  	},
    resend() {
      document.getElementById('resend-verification-email-form').submit();
    }
  }
}
</script>
