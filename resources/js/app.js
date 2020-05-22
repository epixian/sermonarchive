window.axios = require('axios');
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
let token = document.head.querySelector('meta[name="csrf-token"]');
if (token) {
  window.axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content;
}

import 'alpinejs';


// import Echo from 'laravel-echo';

// window.io = require('socket.io-client');

// window.Echo = new Echo({
//     broadcaster: 'socket.io',
//     host: window.location.hostname + ':6001',
// });


window.Vue = require('vue');

Vue.component('record-attendance', require('./components/RecordAttendance.vue').default);
Vue.component('video-player', require('./components/VideoPlayer.vue').default);
// Vue.component('chat-messages', require('./components/ChatMessages.vue').default);
// Vue.component('chat-input', require('./components/ChatInput.vue').default);

const video = new Vue({
  el: '#videoplayer',
});

const attendance = new Vue({
  el: '#attendance',
});

// const app = new Vue({
//   el: '#chat',
//   data: {
//     messages: []
//   },
//   created() {
//     this.fetchMessages();
//     window.Echo.private('nlglive-channel')
//       .listen('nlglive-event', (e) => {
//         console.log(e);
//         this.messages.push({
//           message: e.message.message,
//           user: e.user,
//         });
//       });
//   },
//   methods: {
//     fetchMessages() {
//       axios.get('/messages').then(response => {
//         this.messages = response.data;
//       });
//     },
//     addMessage(message) {
//       this.messages.push(message);
//       // axios.post('http://localhost:6001/apps/0849aee3142281e5/events?auth_key=63011bcdd2110d0bf0125b24a6a1d22e', {
//       //   'channel': 'private-nlglive-channel',
//       //   'name': 'nlglive-event',
//       //   'data': message
//       // })
//       axios.post('/messages', message)
//       .then(response => {
//         console.log(response.data);
//       });
//     }
//   }
// });

