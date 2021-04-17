import Vue from 'vue';
import VueToast from 'vue-toast-notification';
// Import any of available themes
// import 'vue-toast-notification/dist/theme-default.css';
import 'vue-toast-notification/dist/theme-sugar.css';

Vue.use(VueToast, {
    // One of options
    position: 'top',
    message: '',
    type: 'default',
    position: 'top-right',
    duration: 2000,
    queue: true
})


// Close all opened toast immediately
Vue.$toast.clear();
