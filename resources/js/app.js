
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
import Vue from 'vue'
import VueTables from 'vue-tables-2'
require('./bootstrap')

//  Uses
Vue.use(VueTables.ClientTable)

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

/**
 * Con forma de obtener los componentes, ya no es necesario crear dentro de la instancia
 * de Vue la llave components
 */

//  Vue.component('example-component', require('./components/ExampleComponent.vue'));
Vue.component('data-viewer-trainers', require('./components/DataViewerTrainer.vue'))
Vue.component('data-viewer-pokemons', require('./components/DataViewerPokemon.vue'))

const app = new Vue({
    el: '#app'
})
