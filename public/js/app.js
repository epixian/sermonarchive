(window.webpackJsonp=window.webpackJsonp||[]).push([[0],{13:function(e,t,s){s(14),e.exports=s(42)},14:function(e,t,s){"use strict";s.r(t);s(32);window.axios=s(15),window.axios.defaults.headers.common["X-Requested-With"]="XMLHttpRequest";var n=document.head.querySelector('meta[name="csrf-token"]');n&&(window.axios.defaults.headers.common["X-CSRF-TOKEN"]=n.content),window.Vue=s(33),Vue.component("record-attendance",s(39).default),Vue.component("video-player",s(40).default),Vue.component("stream-controller",s(41).default),Vue.component("navigation-menu",s(38).default);new Vue({el:"#app"})},38:function(e,t,s){"use strict";s.r(t);var n={props:{user:{type:Object,required:!0}},data:function(){return{open:!1}},methods:{logout:function(){document.getElementById("logout-form").submit()}}},r=s(1),o={components:{ProfileDropdown:Object(r.a)(n,(function(){var e=this,t=e.$createElement,s=e._self._c||t;return s("div",{staticClass:"hidden sm:ml-6 sm:flex sm:items-center"},[s("div",{staticClass:"relative"},[s("div",[s("button",{staticClass:"flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition duration-150 ease-in-out",attrs:{id:"user-menu","aria-label":"User menu","aria-haspopup":"true"},on:{click:function(t){e.open=!e.open}}},[s("img",{staticClass:"h-10 w-10 rounded-full",attrs:{src:e.user.gravatar,alt:""}})])]),e._v(" "),s("transition",{attrs:{"enter-active-class":"transition ease-out duration-200","enter-class":"transform opacity-0 scale-95","enter-to-class":"transform opacity-100 scale-100","leave-active-class":"transition ease-in duration-75","leave-class":"transform opacity-100 scale-100","leave-to-class":"transform opacity-0 scale-95"}},[s("div",{directives:[{name:"show",rawName:"v-show",value:e.open,expression:"open"}],staticClass:"origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg"},[s("div",{staticClass:"pb-1 rounded-md bg-white shadow-xs"},[s("div",{staticClass:"bg-gray-50 border-b border-gray-200"},[s("div",{staticClass:"px-4 pt-3 text-sm font-medium leading-5 text-gray-700"},[e._v(e._s(e.user.name))]),e._v(" "),s("div",{staticClass:"px-4 pb-2 text-sm leading-5 text-gray-700"},[e._v(e._s(e.user.email))]),e._v(" "),e.user.breeze_id?s("div",{staticClass:"flex items-center px-4 py-2 bg-nl-blue-100 text-sm text-nl-blue-500"},[s("svg",{staticClass:"h-5 w-5 mr-1 stroke-current",attrs:{fill:"none","stroke-linecap":"round","stroke-linejoin":"round","stroke-width":"2",stroke:"currentColor",viewBox:"0 0 24 24"}},[s("path",{attrs:{d:"M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"}})]),e._v("\n              Verified\n            ")]):e._e()]),e._v(" "),s("a",{staticClass:"block px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out",attrs:{href:"/logout"},on:{click:function(t){return t.preventDefault(),e.logout(t)}}},[e._v("Sign out")])])])])],1)])}),[],!1,null,null,null).exports},props:{user:{type:Object,required:!1,default:function(){}},route:{type:String,required:!1,default:""}},data:function(){return{csrf:document.querySelector('meta[name="csrf-token"]').getAttribute("content"),mobileNavOpen:!1,profileDropdownOpen:!1}},computed:{canEditSermons:function(){return!!this.user&&this.user.can.includes("edit_sermons")},canEditServices:function(){return!!this.user&&this.user.can.includes("edit_services")}},methods:{isRoute:function(e){return e===this.route},logout:function(){document.getElementById("logout-form").submit()}}},a=Object(r.a)(o,(function(){var e=this,t=e.$createElement,s=e._self._c||t;return s("nav",{staticClass:"bg-white shadow-sm",attrs:{"x-cloak":"","x-data":"{ menuOpen: false }"}},[s("div",{staticClass:"max-w-7xl mx-auto px-4 sm:px-6 lg:px-8"},[s("div",{staticClass:"flex justify-between h-16"},[s("div",{staticClass:"flex"},[e._m(0),e._v(" "),s("div",{staticClass:"hidden sm:ml-8 sm:flex space-x-8"},[s("a",{staticClass:"inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium leading-5 transition duration-150 ease-in-out",class:e.isRoute("/")?"text-gray-900 border-nl-blue-500 focus:outline-none focus:border-nl-blue-700":"text-gray-500 border-transparent hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300",attrs:{href:"/"}},[e._v("\n\t\t\t\t\t\t\tLive\n\t\t\t\t\t\t")]),e._v(" "),e.canEditServices?s("a",{staticClass:"inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium leading-5 transition duration-150 ease-in-out",class:e.isRoute("admin/services")?"text-gray-900 border-nl-blue-500 focus:outline-none focus:border-nl-blue-700":"text-gray-500 border-transparent hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300",attrs:{href:"/admin/services"}},[e._v("\n\t\t\t\t\t\t\tServices\n\t\t\t\t\t\t")]):e._e(),e._v(" "),e.canEditServices?s("a",{staticClass:"inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium leading-5 transition duration-150 ease-in-out",class:e.isRoute("sermons")?"text-gray-900 border-nl-blue-500 focus:outline-none focus:border-nl-blue-700":"text-gray-500 border-transparent hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300",attrs:{href:"/sermons"}},[e._v("\n\t\t\t\t\t\t\tSermons\n\t\t\t\t\t\t")]):e._e(),e._v(" "),e.canEditServices?s("a",{staticClass:"inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium leading-5 transition duration-150 ease-in-out",class:e.isRoute("admin/users")?"text-gray-900 border-nl-blue-500 focus:outline-none focus:border-nl-blue-700":"text-gray-500 border-transparent hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300",attrs:{href:"/admin/users"}},[e._v("\n\t\t\t\t\t\t\tUsers\n\t\t\t\t\t\t")]):e._e()])]),e._v(" "),s("div",{staticClass:"flex"},[s("div",{staticClass:"hidden sm:ml-6 sm:flex sm:items-center"},[s("span",{staticClass:"rounded-md shadow-sm"},[s("a",{staticClass:"inline-flex items-center px-4 py-2 border border-transparent text-sm leading-5 font-medium rounded-md text-white bg-nl-green-500 hover:bg-nl-green-400 focus:outline-none focus:border-nl-green-500 focus:shadow-outline-nl-green active:bg-nl-green-600 transition ease-in-out duration-150",attrs:{href:"https://www.eservicepayments.com/cgi-bin/Vanco_ver3.vps?appver3=Dc8dzPGn4-LCajFevTkh9IrAPiKyxuq1wz14eIF-xa7wDLnFUBRZuK9-TeNGQgRt3ZjrEf-JY61LsyvVDvllero7zqy-JU_UuLu19bUbJx16ST79ddXa13WVGWu3v78lk0PpduXvnt8gXUeZjQYbn8YMd3VAg-5ef_sTFvOQq-g=&ver=3",target:"_blank"}},[s("svg",{staticClass:"-ml-1 mr-2 h-5 w-5",attrs:{fill:"none","stroke-linecap":"round","stroke-linejoin":"round","stroke-width":"2",stroke:"currentColor",viewBox:"0 0 24 24"}},[s("path",{attrs:{d:"M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z"}})]),e._v("\n\t\t\t\t\t\t\t\tGive\n\t\t\t\t\t\t\t")])])]),e._v(" "),e.user?s("ProfileDropdown",{attrs:{user:e.user}}):s("div",{staticClass:"hidden sm:ml-6 sm:flex space-x-8"},[s("a",{staticClass:"inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium leading-5 transition duration-150 ease-in-out text-gray-500 border-transparent hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300",attrs:{href:"/login"}},[e._v("\n\t\t\t\t\t\t\tSign In\n\t\t\t\t\t\t")]),e._v(" "),s("a",{staticClass:"inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium leading-5 transition duration-150 ease-in-out text-gray-500 border-transparent hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300",attrs:{href:"/register"}},[e._v("\n\t\t\t\t\t\t\tRegister\n\t\t\t\t\t\t")])])],1),e._v(" "),s("div",{staticClass:"-mr-2 flex items-center sm:hidden"},[s("button",{staticClass:"inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out",on:{click:function(t){e.mobileNavOpen=!e.mobileNavOpen}}},[s("svg",{staticClass:"h-6 w-6",class:e.mobileNavOpen?"hidden":"block",attrs:{stroke:"currentColor",fill:"none",viewBox:"0 0 24 24"}},[s("path",{attrs:{"stroke-linecap":"round","stroke-linejoin":"round","stroke-width":"2",d:"M4 6h16M4 12h16M4 18h16"}})]),e._v(" "),s("svg",{staticClass:"h-6 w-6",class:e.mobileNavOpen?"hidden":"block",attrs:{stroke:"currentColor",fill:"none",viewBox:"0 0 24 24"}},[s("path",{attrs:{"stroke-linecap":"round","stroke-linejoin":"round","stroke-width":"2",d:"M6 18L18 6M6 6l12 12"}})])])])])]),e._v(" "),s("div",{directives:[{name:"show",rawName:"v-show",value:e.mobileNavOpen,expression:"mobileNavOpen"}],staticClass:"block sm:hidden"},[s("div",{staticClass:"pt-2 pb-3 space-y-1"},[s("a",{staticClass:"block pl-3 pr-4 py-2 border-l-4 text-base font-medium transition duration-150 ease-in-out",class:e.isRoute("/")?"border-nl-blue-500 text-nl-blue-700 bg-nl-blue-50 focus:outline-none focus:text-nl-blue-800 focus:bg-nl-blue-100 focus:border-nl-blue-700":"border-transparent text-gray-600 hover:text-gray-800 hover:bg-gray-50 hover:border-gray-300 focus:outline-none focus:text-gray-800 focus:bg-gray-50 focus:border-gray-300",attrs:{href:"/"}},[e._v("Live")]),e._v(" "),e.canEditServices?s("a",{staticClass:"block pl-3 pr-4 py-2 border-l-4 text-base font-medium transition duration-150 ease-in-out",class:e.isRoute("admin/services")?"border-nl-blue-500 text-nl-blue-700 bg-nl-blue-50 focus:outline-none focus:text-nl-blue-800 focus:bg-nl-blue-100 focus:border-nl-blue-700":"border-transparent text-gray-600 hover:text-gray-800 hover:bg-gray-50 hover:border-gray-300 focus:outline-none focus:text-gray-800 focus:bg-gray-50 focus:border-gray-300",attrs:{href:"/admin/services"}},[e._v("Services")]):e._e(),e._v(" "),e.canEditSermons?s("a",{staticClass:"block pl-3 pr-4 py-2 border-l-4 text-base font-medium transition duration-150 ease-in-out",class:e.isRoute("sermons")?"border-nl-blue-500 text-nl-blue-700 bg-nl-blue-50 focus:outline-none focus:text-nl-blue-800 focus:bg-nl-blue-100 focus:border-nl-blue-700":"border-transparent text-gray-600 hover:text-gray-800 hover:bg-gray-50 hover:border-gray-300 focus:outline-none focus:text-gray-800 focus:bg-gray-50 focus:border-gray-300",attrs:{href:"/sermons"}},[e._v("Sermons")]):e._e(),e._v(" "),e.canEditServices?s("a",{staticClass:"block pl-3 pr-4 py-2 border-l-4 text-base font-medium transition duration-150 ease-in-out",class:e.isRoute("admin/users")?"border-nl-blue-500 text-nl-blue-700 bg-nl-blue-50 focus:outline-none focus:text-nl-blue-800 focus:bg-nl-blue-100 focus:border-nl-blue-700":"border-transparent text-gray-600 hover:text-gray-800 hover:bg-gray-50 hover:border-gray-300 focus:outline-none focus:text-gray-800 focus:bg-gray-50 focus:border-gray-300",attrs:{href:"/admin/users"}},[e._v("Users")]):e._e()]),e._v(" "),s("div",{staticClass:"pt-4 pb-3 border-t border-gray-200"},[e.user?s("div",[s("div",{staticClass:"flex items-center px-4"},[s("div",{staticClass:"flex-shrink-0"},[s("img",{staticClass:"h-10 w-10 rounded-full",attrs:{src:e.user.gravatar,alt:""}})]),e._v(" "),s("div",{staticClass:"ml-3"},[s("div",{staticClass:"text-base font-medium leading-6 text-gray-800"},[e._v("\n\t              "+e._s(e.user.name)+"\n\t            ")]),e._v(" "),s("div",{staticClass:"inline-flex text-sm font-medium leading-5 text-gray-500"},[e._v("\n\t              "+e._s(e.user.email)+"\n\t              "),e.user.breeze_id?s("span",{staticClass:"inline-flex items-center text-nl-blue-500 ml-2"},[s("svg",{staticClass:"h-6 w-6 stroke-current",attrs:{fill:"none","stroke-linecap":"round","stroke-linejoin":"round","stroke-width":"2",stroke:"currentColor",viewBox:"0 0 24 24"}},[s("path",{attrs:{d:"M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"}})]),e._v("\n\t                Verified\n\t              ")]):e._e()])])]),e._v(" "),s("div",{staticClass:"mt-3 space-y-1",attrs:{role:"menu","aria-orientation":"vertical","aria-labelledby":"user-menu"}},[s("a",{staticClass:"block px-4 py-2 text-base font-medium text-gray-500 hover:text-gray-800 hover:bg-gray-100 focus:outline-none focus:text-gray-800 focus:bg-gray-100 transition duration-150 ease-in-out",attrs:{href:"/logout",role:"menuitem"},on:{click:e.logout}},[e._v("Sign Out")])])]):s("div",{staticClass:"mt-3 space-y-1",attrs:{role:"menu","aria-orientation":"vertical","aria-labelledby":"user-menu"}},[s("a",{staticClass:"block px-4 py-2 text-base font-medium text-gray-500 hover:text-gray-800 hover:bg-gray-100 focus:outline-none focus:text-gray-800 focus:bg-gray-100 transition duration-150 ease-in-out",attrs:{href:"/login",role:"menuitem"}},[e._v("Sign In")]),e._v(" "),s("a",{staticClass:"block px-4 py-2 text-base font-medium text-gray-500 hover:text-gray-800 hover:bg-gray-100 focus:outline-none focus:text-gray-800 focus:bg-gray-100 transition duration-150 ease-in-out",attrs:{href:"/register",role:"menuitem"}},[e._v("Register")])])])]),e._v(" "),s("form",{staticClass:"hidden",attrs:{id:"logout-form",action:"/logout",method:"POST"}},[s("input",{attrs:{type:"hidden",name:"_token"},domProps:{value:e.csrf}})])])}),[function(){var e=this.$createElement,t=this._self._c||e;return t("div",{staticClass:"flex-shrink-0 flex items-center"},[t("a",{attrs:{href:"/"}},[t("img",{staticClass:"hidden sm:block lg:hidden h-12 w-auto",attrs:{src:"https://cdn.newlifeglenside.com/leaf.png",alt:"New Life logo"}}),this._v(" "),t("img",{staticClass:"block sm:hidden lg:block h-12 w-auto",attrs:{src:"https://cdn.newlifeglenside.com/nlg-logo.png",alt:"New Life logo"}})])])}],!1,null,null,null);t.default=a.exports},39:function(e,t,s){"use strict";s.r(t);var n={data:function(){return{available:[],selected:[],showAttendancePad:!1,message:"",showButtons:!1}},created:function(){var e=this;fetch("/user/family").then((function(e){return e.json()})).then((function(t){e.available=t,e.showButtons=!0}))},methods:{clickCheckInButton:function(){this.available.length?this.showAttendancePad=!0:this.message="Already checked in!"},checkIn:function(e){axios.post("/check-in",e).then(console.log)},select:function(e){var t=this;this.selected.push(e),axios.post("/check-in",e).then((function(){t.available=t.available.filter((function(t){return t!==e}))}))}}},r=s(1),o=Object(r.a)(n,(function(){var e=this,t=e.$createElement,s=e._self._c||t;return s("div",{staticClass:"max-w-7xl mx-auto px-4 sm:px-6 lg:px-8"},[s("div",{staticClass:"relative mt-4"},[s("transition",{attrs:{"enter-active-class":"transition ease-in duration-100","enter-class":"opacity-0","enter-to-class":"opacity-100","leave-active-class":"transition ease-out duration-75","leave-class":"opacity-100","leave-to-class":"opacity-0",mode:"out-in"}},[s("div",{directives:[{name:"show",rawName:"v-show",value:e.available.length&&e.showAttendancePad,expression:"available.length && showAttendancePad"}]},[s("div",{staticClass:"mx-4 sm:mx-6 text-base text-center leading-6 font-medium"},[e._v("\n          Who is checking in?\n        ")]),e._v(" "),s("div",{staticClass:"flex flex-wrap items-center justify-center mx-4 sm:mx-6 space-x-2"},e._l(e.available,(function(t){return s("span",{key:t.id,staticClass:"inline-flex rounded-md shadow-sm"},[s("button",{staticClass:"mt-2 inline-flex items-center px-4 py-2 border text-sm leading-5 font-medium rounded-md transition ease-in-out duration-150",class:e.selected.includes(t)?"border-nl-green-300 text-nl-green-700 bg-nl-green-100 hover:bg-nl-green-50 focus:outline-none focus:border-nl-green-300 focus:shadow-outline-nl-green active:bg-nl-green-200":"border-gray-300 text-gray-700 bg-white hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue active:text-gray-800 active:bg-gray-50",attrs:{type:"button"},on:{click:function(s){return e.select(t)}}},[e._v("\n              "+e._s(t.name)+"\n            ")])])})),0)])]),e._v(" "),e.showButtons?s("div",{staticClass:"absolute top-0 right-0 flex rounded-md shadow-sm"},[s("transition",{attrs:{mode:"out-in"}},[e.available.length?s("div",[e.showAttendancePad?s("button",{staticClass:"inline-flex items-center px-4 py-2 border text-sm leading-5 font-medium rounded-md transition ease-in-out duration-150 border-gray-300 text-gray-700 bg-white hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue active:text-gray-800 active:bg-gray-50",attrs:{type:"button"},on:{click:function(t){e.showAttendancePad=!1}}},[e._v("\n            Close\n          ")]):s("button",{staticClass:"inline-flex items-center px-4 py-2 border border-transparent text-sm leading-5 font-medium rounded-md text-white bg-nl-blue-600 hover:bg-nl-blue-500 focus:outline-none focus:border-nl-blue-700 focus:shadow-outline-nl-blue active:bg-nl-blue-700 transition ease-in-out duration-150",attrs:{type:"button"},on:{click:function(t){e.showAttendancePad=!0}}},[e._v("\n            Check In\n          ")])]):e._e()])],1):e._e()],1)])}),[],!1,null,null,null);t.default=o.exports},40:function(e,t,s){"use strict";s.r(t);var n=s(12),r=s.n(n),o={props:{sermon:{type:Object,required:!0},control:{type:Boolean,required:!1,default:!1},mode:{type:String,required:!1,default:"live"}},data:function(){return{stream_started:this.sermon.stream_started,stream_ended:this.sermon.stream_ended,recording_done:this.sermon.recording_done}},computed:{fromNow:function(){return r()(this.sermon.scheduled_for).fromNow()},statusText:function(){return 0!==this.recording_done?"recorded":0!==this.stream_ended&&0===this.recording_done?"processing":0!==this.stream_started&&0===this.stream_ended?"streaming":"waiting"}},methods:{getStatus:function(){var e=this;fetch("/sermons/"+this.sermon.id+"/status").then((function(e){return e.json()})).then((function(t){e.stream_started=t.stream_started,e.stream_ended=t.stream_ended,e.recording_done=t.recording_done,"waiting"!==e.statusText&&"processing"!==e.statusText||setTimeout(e.getStatus,1e4)}))}},created:function(){"preview"!==this.mode&&this.getStatus()}},a=s(1),i=Object(a.a)(o,(function(){var e=this,t=e.$createElement,s=e._self._c||t;return s("div",["waiting"===e.statusText&&"live"===e.mode?s("div",{class:{"flex flex-col-reverse":e.control}},[s("p",{staticClass:"px-4 sm:px-0",class:{"mt-4":e.control}},[e._v("\n      The stream will begin about "+e._s(e.fromNow)+".  Please prepare your hearts for worship.\n    ")]),e._v(" "),s("img",{staticClass:"w-full shadow-md max-w-3xl",class:{"mt-4":!e.control},attrs:{src:"https://cdn.newlifeglenside.com/nlg-logo-white.png",alt:"New Life logo"}})]):e._e(),e._v(" "),"streaming"===e.statusText||"preview"===e.mode||"recorded"===e.statusText?s("video-js",{staticClass:"video-js vjs-big-play-centered h-full shadow-md",attrs:{controls:"",autoplay:"",preload:"none","data-setup":'{ "liveui": true }'}},["streaming"===e.statusText||"preview"===e.mode?s("source",{attrs:{src:"https://stream.newlifeglenside.com/hls/"+e.sermon.stream_key+".m3u8",type:"application/vnd.apple.mpegurl"}}):s("source",{attrs:{src:"https://stream.newlifeglenside.com/recordings/"+e.sermon.stream_key+".mp4",type:"video/mp4"}}),e._v(" "),s("p",{staticClass:"vjs-no-js"},[e._v("To watch this video, please enable Javascript or use a browser that supports HTML5 video.")])]):e._e(),e._v(" "),"processing"===e.statusText&&"preview"!==e.mode?s("div",{class:{"flex flex-col-reverse":e.control}},[s("p",{staticClass:"px-4 sm:px-0",class:{"mt-4":e.control}},[e._v("\n      The stream has ended and is currently processing.  Please check back in a little bit.\n    ")]),e._v(" "),s("img",{staticClass:"w-full shadow-md max-w-3xl",class:{"mt-4":!e.control},attrs:{src:"https://cdn.newlifeglenside.com/nlg-logo-white.png",alt:"New Life logo"}})]):e._e(),e._v(" "),e.control?e._e():s("div",{staticClass:"mt-4 mx-4 sm:mx-0"},[s("h2",{staticClass:"text-lg font-bold leading-tight text-gray-900"},[e._v(e._s(e.sermon.name))]),e._v(" "),e.control?s("div",{staticClass:"text-base text-gray-900"},[e._v("\n      "+e._s(e.sermon.description)+"\n    ")]):e._e()])],1)}),[],!1,null,null,null);t.default=i.exports},41:function(e,t,s){"use strict";s.r(t);var n={props:{sermon:{type:Object,required:!0}},data:function(){return{stream_started:!1,stream_ended:!1}},methods:{doneRecording:function(){var e=this;axios.post("/admin/sermons/"+this.sermon.id+"/status",{recording_done:!0}).then((function(e){return e.data})).then((function(t){e.recording_done=t.recording_done}))},startStream:function(){var e=this;axios.post("/admin/sermons/"+this.sermon.id+"/status",{stream_started:!0}).then((function(e){return e.data})).then((function(t){e.stream_started=t.stream_started}))},endStream:function(){var e=this;axios.post("/admin/sermons/"+this.sermon.id+"/status",{stream_ended:!0}).then((function(e){return e.data})).then((function(t){e.stream_ended=t.stream_ended}))}},created:function(){var e=this;axios.get("/sermons/"+this.sermon.id+"/status").then((function(e){return e.data})).then((function(t){e.stream_started=t.stream_started,e.stream_ended=t.stream_ended,e.recording_done=t.recording_done}))}},r=s(1),o=Object(r.a)(n,(function(){var e=this,t=e.$createElement,s=e._self._c||t;return s("div",{staticClass:"text-right"},[e.stream_started?e._e():s("span",{staticClass:"inline-flex rounded-md shadow-sm"},[s("button",{staticClass:"inline-flex items-center px-4 py-2 border border-transparent text-sm leading-5 font-medium rounded-md text-white bg-nl-blue-600 hover:bg-nl-blue-500 focus:outline-none focus:border-nl-blue-700 focus:shadow-outline-nl-blue active:bg-nl-blue-700 transition ease-in-out duration-150",attrs:{type:"button"},on:{click:e.startStream}},[e._v("\n      Go Live\n    ")])]),e._v(" "),e.stream_started&&!e.stream_ended?s("span",{staticClass:"inline-flex rounded-md shadow-sm"},[s("button",{staticClass:"inline-flex items-center px-4 py-2 border border-transparent text-sm leading-5 font-medium rounded-md text-white bg-nl-blue-600 hover:bg-nl-blue-500 focus:outline-none focus:border-nl-blue-700 focus:shadow-outline-nl-blue active:bg-nl-blue-700 transition ease-in-out duration-150",attrs:{type:"button"},on:{click:e.endStream}},[e._v("\n      End Stream\n    ")])]):e._e(),e._v(" "),e.stream_ended&&!e.recording_done?s("span",{staticClass:"inline-flex rounded-md shadow-sm"},[s("button",{staticClass:"inline-flex items-center px-4 py-2 border border-transparent text-sm leading-5 font-medium rounded-md text-white bg-nl-blue-600 hover:bg-nl-blue-500 focus:outline-none focus:border-nl-blue-700 focus:shadow-outline-nl-blue active:bg-nl-blue-700 transition ease-in-out duration-150",attrs:{type:"button"},on:{click:e.doneRecording}},[e._v("\n      ffmpeg Done (manual)\n    ")])]):e._e()])}),[],!1,null,null,null);t.default=o.exports},42:function(e,t){}},[[13,1,2]]]);