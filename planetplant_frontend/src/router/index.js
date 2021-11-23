import Vue from 'vue'
import VueRouter from 'vue-router'
import Home from '../views/Home.vue'
import Product from '../views/Product.vue'
import ShowProduct from '../views/ShowProduct.vue'
import DetailProduct from '../views/DetailProduct.vue'
import ShoppingCart from '../views/ShoppingCart.vue'
import ShoppingCartEmpty from '../views/ShoppingCartEmpty.vue'
import Login from '../views/Login.vue'
import Checkout from '../views/Checkout.vue'
import ListOrder from '../views/ListOrder.vue'
import ListAddress from '../views/ListAddress.vue'
import EditProfile from '../views/EditProfile.vue'
import ConfirmationPayment from '../views/ConfirmationPayment.vue'
import Register from '../views/Register.vue'
Vue.use(VueRouter)

const routes = [
  {
    path: '/',
    name: 'Home',
    component: Home
  },
  // {
  //   path: '/about',
  //   name: 'About',
  //   // route level code-splitting
  //   // this generates a separate chunk (about.[hash].js) for this route
  //   // which is lazy-loaded when the route is visited.
  //   component: () => import(/* webpackChunkName: "about" */ '../views/About.vue')
  // },
  {
    path: '/produk',
    name: 'Product',
    component: Product
  },
  {
    path: '/produk/tipe/:id/:name',
    props:true,
    name: 'ShowProduct',
    component: ShowProduct
  },
  {
    path: '/produk/:id',
    props:true,
    name: 'DetailProduct',
    component: DetailProduct
  },
  {
    path: '/shoppingcart',
    name: 'ShoppingCart',
    component: ShoppingCart
  },
  {
    path: '/shopping_cart_empty',
    name: 'ShoppingCartEmpty',
    component: ShoppingCartEmpty
  },
  {
    path: '/login',
    name: 'Login',
    component: Login
  },
  {
    path: '/checkout',
    name: 'Checkout',
    component: Checkout
  },
  {
    path: '/listorder',
    name: 'Listorder',
    component:ListOrder
  },
  {
    path: '/editprofile',
    name: 'EditProfile',
    component:EditProfile
  },
  {
    path: '/confirmationpayment',
    name: 'ConfirmationPayment',
    component:ConfirmationPayment
  },
  {
    path: '/listaddress',
    name: 'ListAddress',
    component:ListAddress
  },
  {
    path: '/register',
    name: 'Register',
    component:Register
  },
]

const router = new VueRouter({
  routes
})

export default router
