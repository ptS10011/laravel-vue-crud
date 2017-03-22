require('./bootstrap');

import App from './App.vue';
import Router from './routes.js'

new Vue({
    el: '#app',
    router: Router,
    render: h => h(App)
});
