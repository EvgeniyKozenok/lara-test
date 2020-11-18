import Vue from 'vue';
import TokenManagementComponent from './components/TokenManagementComponent';
require('./bootstrap');

new Vue({
    el: '#app-home',
    template: '<TokenManagementComponent/>',
    components: { TokenManagementComponent }
});
