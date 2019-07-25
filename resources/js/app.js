
import VueRouter from 'vue-router'
import routes from './routes'
import 'jquery-ui/ui/widgets/datepicker';

require('./bootstrap');

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

const files = require.context('./', true, /\.vue$/i);
files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

// Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
Vue.use(VueRouter);
window.events = new Vue();
new Vue({
    el: '#app',
    router: new VueRouter(routes),
    data: {
    	currentYear: (new Date()).getFullYear(),
    	taxYear: (new Date()).getFullYear() - 1,
    	personal: {
    		firstName: '',
    		lastName: '',
    		passport: '',
    		citizen: '',
    		phone: '',
    		ssn: '',
    		birthday: ''
    	},
    	address: {
    		street: '',
    		city: '',
    		state: '',
    		zip: ''
    	}
    },
    mounted() {
    	this.registerDatepicker()
    },
    updated() {
    	this.registerDatepicker()
    },
    methods: {
    	registerDatepicker() {
    		$('.datepicker').datepicker({
	            changeMonth:true,
	            changeYear:true,
	            yearRange: "-100:"+this.currentYear,
	        })
    	}
    }
});
