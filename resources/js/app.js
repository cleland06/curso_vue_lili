
require('./bootstrap');
import Router from 'vue-router'
import { get } from 'lodash';

window.Vue = require('vue');


Vue.component('example', require('./components/Example.vue'));
Vue.component('btn_aceptar', require('./components/btn_aceptar.vue').default);
Vue.component('tbl_ventas', require('./views/ventas/tbl_ventas.vue').default);

//le decimos a vue que ya puede usar Router
Vue.use(Router);

//definiendo rutas
let router = new Router({
    'routes': [
        {
			'path':'/home',
			'name':'home',
            'component':{
                'template':'<div>Este es el home, holi esto aparecio desde el app.js </div>'
            }
        },
        {
			path:"/productos",
			name:"productos",
			component:require('./views/productos/index').default
		},
		{
			path:'/productos/create',
			name:'productos.create',
			component:require('./views/productos/create').default
		},
		{
			path:'/productos/:id',
			component:require('./views/productos/edit').default
		},
		{
			path:'/ventas/create',
			name:'ventas.create',
			component:require('./views/ventas/create').default
		}
    ],
    mode:'history',
})



window.app = new Vue({
    el: '#app',
    router:router,
});

//alert("hola");