/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

import Vue from 'vue'
import VueRouter from 'vue-router'
import { createProvider } from 'vue-apollo';
import { ApolloClient } from 'apollo-client';
import { HttpLink } from 'apollo-link-http';
import { InMemoryCache } from 'apollo-cache-inmemory';

import VueApollo, { ApolloProvider } from 'vue-apollo';

Vue.use(VueRouter)

Vue.config.productionTip = false; 

const httpLink = new HttpLink({
    uri: 'http://127.0.0.1:8000/graphql'
  });
  
  const apolloClient = new ApolloClient({
    link: httpLink,
    cache: new InMemoryCache(),
    connectToDevTools: true
  });
  
  Vue.use(VueApollo);
  
  const apolloProvider = new VueApollo({
    defaultClient: apolloClient
  });
  

import EditProduct from './views/EditProduct'
import AddProduct from './views/AddProduct'
import Products from './views/Products'
import App from './components/App'

// Vue.component('example-component', require('./components/ExampleComponent.vue').default);

const router = new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/',
            name: 'products',
            component: Products
        },
        {
            path: '/addproduct',
            name: 'addproduct',
            component: AddProduct
        },
        { 
          path: '/product/:pid', 
          name: 'editproduct',
          component: EditProduct, 
          props: true, 
        },
    ],
});


const app = new Vue({
  router,
  apolloProvider,
  render: function(createElement){
      return createElement(App)
  }
}).$mount('#app')
